<?php

namespace App\Http\Controllers;

use App\Models\{Soal, Hasil, Paket, Respon, Jawaban, Result};
use App\Http\Requests\{StorePaketRequest, UpdatePaketRequest};
use Illuminate\Support\Facades\{Session, Gate, Auth};

class PaketController extends Controller
{
    public function list(Paket $paket)
    {

        return view('paket.list', ['paket' => $paket, 'title' => 'Daftar Hasil Siswa']);
    }


    public function publish(Paket $paket)
    {
        Gate::allowIf(Auth::user()->role != 3);
        $paket->update(['status' => !$paket->status]);
        return redirect()->route('paket.soal.index', ['paket' => $paket->uuid])->with('icon', 'success')->with('title', 'Berhasil')->with('message', $paket->status ? 'Paket soal berhasil dipublikasikan!' : 'Paket soal berhasil diunpublish!');
    }


    public function testIndex(Paket $paket)
    {

        Gate::allowIf($paket->hasil);
        // Gate::allowIf(!$paket->hasil || $paket->hasil->first()->nilai == null);
        Session::forget('time');
        Session::forget('last_no');
        return view('paket.testIndex', [
            'title' => $paket->nama,
            'paket' => $paket,
            'user' => Auth::user(),
        ]);
    }
    public function hasil(Paket $paket, Result $result)
    {
        return view('paket.hasil', [
            'title' => 'Hasil ' . $paket->nama,
            'paket' => $paket,
            'total' => floor(($paket->hasil->pluck('nilai')->sum() / ($paket->hasil->pluck('nilai')->count() * 100)) * 100),
            'hasils' => $paket->hasil->where('user_id', Auth::user()->id)->where('result_id', $result->id),
            'user' => Auth::user(),
        ]);
    }

    public function selesai(Paket $paket, Result $result)
    {
        Session::forget('time');
        Session::forget('last_no');
        $userId = Auth::id();
        $responses = $this->getUserResponses($userId, $paket);
        $scores = $this->calculateScores($responses);
        $totalNilai = $this->calculateTotalNilai($paket, $scores);
        $this->updateHasil($paket, $totalNilai, $result);
        return redirect()->route('hasil', ['paket' => $paket->uuid, 'result' => $result->id]);
    }
    private function getUserResponses($userId, Paket $paket)
    {
        return Respon::where('user_id', $userId)
            ->whereHas('soal', function ($query) use ($paket) {
                $query->where('paket_id', $paket->id);
            })->get();
    }

    private function calculateScores($responses)
    {
        $kategoris = [];
        foreach ($responses as $response) {
            $kategori = $response->jawaban->soal->kategori;
            $kategoris[$kategori->id] = 0;
        }
        foreach ($responses as $respon) {
            $soal = $respon->soal;
            $jawaban = Jawaban::find($respon->jawaban_id);
            $kategori = $soal->kategori;
            if ($kategori->byPoin) {
                $kategoris[$respon->jawaban->soal->kategori->id]
                    += $jawaban->poin;
            } else {
                if ($jawaban->benar) {
                    $kategoris[$respon->jawaban->soal->kategori->id]++;
                }
            }
        }
        return $kategoris;
    }
    private function calculateTotalNilai(Paket $paket, $scores)
    {
        $kategoris = $paket->base->kategori;


        $totalNilai = [];
        foreach ($scores as $key => $score) {


            $kategori = $kategoris->find($key);

            if ($kategori->byPoin) {
                $totalNilai[$kategori->id] = (int)floor(($scores[$kategori->id] / ($paket->soal->where('kategori_id', $kategori->id)->count() * 5)) * 100);
            } else {
                $totalNilai[$kategori->id] = (int)floor(($scores[$kategori->id] / $paket->soal->where('kategori_id', $kategori->id)->count()) * 100);
            }
        }
        return $totalNilai;
        // return (int)floor(((array_sum($totalNilai)) / 300) * 100);
    }
    private function updateHasil(Paket $paket, $totalNilai, $result)
    {
        $kategoris = [];
        foreach ($paket->base->kategori as $key => $kategori) {
            $kategoris[] = $kategori;
        }
        foreach ($kategoris as $kategori) {
            Hasil::where('paket_id', $paket->id)
                ->where('user_id', Auth::id())
                ->where('kategori_id', $kategori->id)
                ->update(['nilai' => $totalNilai[$kategori->id] ?? 0, 'completed_at' => now()]);
        }
        $nilai = ((int)floor(($paket->hasil->pluck('nilai')->sum() / ($paket->hasil->pluck('nilai')->count() * 100)) * 100));
        $result->nilai = $nilai;
    }


    public function test(Paket $paket)
    {
        // Gate::allowIf($paket->hasil->first()->nilai == null);
        $user = Auth::user();
        $existingHasil = Hasil::where('paket_id', $paket->id)->where('user_id', $user->id)->first();
        $result = Result::where('paket_id', $paket->id)->where('user_id', $user->id)->where('nilai', null)->get()->last();
        if (!$result) {
            $soalsSorted = $this->getShuffledSoalByPaket($paket);
            $urutanString = implode(',', $soalsSorted->pluck('id')->toArray());
            $result = Result::create(['user_id' => $user->id, 'paket_id' => $paket->id, 'paket' => $paket->nama, 'urutan' => $urutanString]);
            foreach ($paket->base->kategori as $kategori) {
                Hasil::create([
                    'user_id' => $user->id,
                    'paket_id' => $paket->id,
                    'result_id' => $result->id,
                    'kategori_id' => $kategori->id,
                    'urutan' => $urutanString,
                ]);
            };
        } else {
            $urutanArray = explode(',', $existingHasil->first()->urutan);
            $soalsSorted = $this->sortSoalsByOrder($urutanArray);
        }
        return view('paket.test', [
            'title' => $paket->nama,
            'paket' => $paket,
            'result' => $result,
            'user' => $user,
            'soals' => $soalsSorted,
        ]);
    }

    private
    function getShuffledSoalByPaket($paket)
    {
        $categories = [];
        foreach ($paket->base->kategori as $kategori) {
            $categories[] = $kategori->id;
        }
        $allSoal = collect();

        foreach ($categories as $categoryId) {
            $soal = $this->getShuffledSoalByKategori($paket->id, $categoryId);
            $allSoal = $allSoal->merge($soal);
        }
        return $allSoal;
    }

    private function getShuffledSoalByKategori($paketId, $kategoriId)
    {
        return Soal::where('paket_id', $paketId)
            ->where('kategori_id', $kategoriId)
            ->get()
            ->shuffle();
    }

    private function shuffleSoals(Paket $paket)
    {
        if ($paket->base->id == 1) {
            $twk = Soal::where('paket_id', $paket->id)->where('kategori_id', 1)->get()->shuffle();
            $tiu = Soal::where('paket_id', $paket->id)->where('kategori_id', 2)->get()->shuffle();
            $tkp = Soal::where('paket_id', $paket->id)->where('kategori_id', 3)->get()->shuffle();
            return $twk->merge($tiu)->merge($tkp);
        } else {
            return Soal::where('paket_id', $paket->id)->get()->shuffle();
        }
    }

    private function sortSoalsByOrder(array $urutanArray)
    {
        return Soal::whereIn('id', $urutanArray)->get()
            ->sortBy(function ($soal) use ($urutanArray) {
                return array_search($soal->id, $urutanArray);
            })->values();
    }

    public function index()
    {
        $pakets = Auth::user()->role == 1
            ? Paket::all()
            : (Auth::user()->role == 2
                ? Paket::where('user_id', Auth::id())->get()
                : Paket::where('status', true)->get());


        return view('paket.index', [
            'title' => 'Daftar Paket Soal',
            'pakets' => $pakets,
        ]);
    }

    public function create()
    {
        Gate::authorize('create', Paket::class);
        return view('paket.create', ['title' => 'Tambah Paket Soal']);
    }

    public function store(StorePaketRequest $request)
    {
        // Implementasi penyimpanan paket soal
    }

    public function show(Paket $paket)
    {
        // Implementasi tampilan detail paket soal
    }

    public function edit(Paket $paket)
    {
        // Implementasi form edit paket soal
    }

    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        // Implementasi update paket soal
    }

    public function destroy(Paket $paket)
    {
        Gate::allowIf(Auth::user()->role == 1 || 2);
        $paket->delete();
        return redirect()->route('paket.index')->with('icon', 'success')->with('title', 'Berhasil')->with('message',  'Paket berhasil dihapus!');
    }
}
