<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Hasil;
use App\Models\Paket;
use App\Models\Respon;
use App\Models\Jawaban;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
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
            'hasil' => $paket->hasil->where('paket_id', $paket->id)->first(),
            'user' => Auth::user(),
        ]);
    }

    public function selesai(Paket $paket)
    {
        $userId = Auth::id();

        $tiuScore = 0;
        $twkScore = 0;
        $tkpScore = 0;

        // Ambil semua respon dari user untuk paket soal tertentu
        $responses = Respon::where('user_id', $userId)
            ->whereHas('soal', function ($query) use ($paket) {
                $query->where('paket_id', $paket->id);
            })->get();

        foreach ($responses as $respon) {
            $soal = $respon->soal;
            $jawaban = Jawaban::find($respon->jawaban_id);
            $kategori = $soal->kategori->nama;

            if ($kategori == 'TIU') {
                if ($jawaban->benar) {
                    $tiuScore++;
                }
            } elseif ($kategori == 'TWK') {
                if ($jawaban->benar) {
                    $twkScore++;
                }
            } elseif ($kategori == 'TKP') {
                $tkpScore += $jawaban->poin;
            }
        }


        $totalPoin = $paket->soal->where('kategori_id', 1)->count() +
            $paket->soal->where('kategori_id', 2)->count() +
            ($paket->soal->where('kategori_id', 3)->count() * 5);
        $nilaiTwk = (int)floor(($twkScore / $paket->soal->where('kategori_id', 1)->count()) * 100);
        $nilaiTiu = (int)floor(($tiuScore / $paket->soal->where('kategori_id', 2)->count()) * 100);
        $nilaiTkp = (int)floor(($tkpScore / ($paket->soal->where('kategori_id', 3)->count() * 5)) * 100);
        $totalNilai = $nilaiTwk + $nilaiTiu + $nilaiTkp;
        // $nilai = (int)floor(($totalNilai / $totalPoin) * 100);
        $nilai = (int)floor(($totalNilai / 300) * 100);
        Hasil::where('paket_id', $paket->id)
            ->where('user_id', Auth::id())
            ->update([
                'twk' => $nilaiTwk,
                'tiu' => $nilaiTiu,
                'tkp' => $nilaiTkp,
                'total_skor' => $nilai,
                'completed_at' => now(),
            ]);
        return redirect()->route('hasil', ['paket' => $paket->uuid]);
    }

    public function test(Paket $paket)
    {
        $user = Auth::user();
        $existingHasil = Hasil::where('paket_id', $paket->id)->where('user_id', $user->id)->first();

        if (!$existingHasil) {
            $soalsSorted = $this->shuffleSoals($paket);
            $urutanString = implode(',', $soalsSorted->pluck('id')->toArray());

            Hasil::create([
                'user_id' => $user->id,
                'paket_id' => $paket->id,
                'urutan' => $urutanString,
            ]);
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

    private function shuffleSoals(Paket $paket)
    {
        $twk = Soal::where('paket_id', $paket->id)->where('kategori_id', 1)->get()->shuffle();
        $tiu = Soal::where('paket_id', $paket->id)->where('kategori_id', 2)->get()->shuffle();
        $tkp = Soal::where('paket_id', $paket->id)->where('kategori_id', 3)->get()->shuffle();

        return $twk->merge($tiu)->merge($tkp);
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
