<?php

namespace App\Http\Controllers;

use App\Models\{Soal, Hasil, Paket, Respon, Jawaban};
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class PaketController extends Controller
{
    public function publish(Paket $paket)
    {
        // update paket status to true
        $paket->update(['status' => true]);
        // redirect
        return redirect()->route('paket.soal.index', ['paket' => $paket->uuid])->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Paket soal berhasil dipublikasikan!');
    }


    public function testIndex(Paket $paket)
    {
        Session::forget('time');
        Session::forget('last_no');
        return view('paket.testIndex', [
            'title' => $paket->nama,
            'paket' => $paket,
            'user' => Auth::user(),
        ]);
    }
    public function hasil(Paket $paket)
    {
        return view('paket.hasil', [
            'title' => 'Hasil ' . $paket->nama,
            'paket' => $paket,
            'total' => floor(($paket->hasil->pluck('nilai')->sum() / ($paket->hasil->pluck('nilai')->count() * 100)) * 100),
            'hasils' => $paket->hasil,
            'user' => Auth::user(),
        ]);
    }

    public function selesai(Paket $paket)
    {
        Session::forget('time');
        Session::forget('last_no');
        $userId = Auth::id();
        $responses = $this->getUserResponses($userId, $paket);
        $scores = $this->calculateScores($responses);
        $totalNilai = $this->calculateTotalNilai($paket, $scores);
        $this->updateHasil($paket, $totalNilai);
        return redirect()->route('hasil', ['paket' => $paket->uuid]);
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
    private function updateHasil(Paket $paket, $totalNilai)
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
    }


    public function test(Paket $paket)
    {
        $user = Auth::user();
        $existingHasil = Hasil::where('paket_id', $paket->id)->where('user_id', $user->id)->first();
        if (!$existingHasil) {
            $soalsSorted = $this->getShuffledSoalByPaket($paket);
            $urutanString = implode(',', $soalsSorted->pluck('id')->toArray());
            foreach ($paket->base->kategori as $kategori) {
                Hasil::create([
                    'user_id' => $user->id,
                    'paket_id' => $paket->id,
                    'kategori_id' => $kategori->id,
                    'urutan' => $urutanString,
                ]);
            };
        } else {
            $urutanArray = explode(',', $existingHasil->urutan);
            $soalsSorted = $this->sortSoalsByOrder($urutanArray);
        }
        return view('paket.test', [
            'title' => $paket->nama,
            'paket' => $paket,
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
        // Implementasi penghapusan paket soal
    }
}
