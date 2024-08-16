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

class PaketController extends Controller
{
    public function testIndex(Paket $paket)
    {
        return view('paket.testIndex', [
            'title' => $paket->nama,
            'paket' => $paket,
            'user' => Auth::user(),
        ]);
    }

    public function selesai(Paket $paket)
    {
        $responses = Respon::where('user_id', Auth::id())
            ->whereHas('soal.paket', function ($query) use ($paket) {
                $query->where('uuid', $paket->uuid);
            })
            ->get();

        $totalNilai = $responses->reduce(function ($total, $respon) {
            $kategori = $respon->soal->kategori->nama;
            $jawaban = Jawaban::find($respon->jawaban_id);

            if (in_array($kategori, ['TIU', 'TWK']) && $jawaban->benar) {
                return $total + 1;
            } elseif ($kategori === 'TKP') {
                return $total + $jawaban->poin;
            }

            return $total;
        }, 0);

        $totalPoin = $paket->soal->where('kategori_id', 1)->count() +
            $paket->soal->where('kategori_id', 2)->count() +
            ($paket->soal->where('kategori_id', 3)->count() * 5);

        $nilai = floor(($totalNilai / $totalPoin) * 100);

        Hasil::where('paket_id', $paket->id)
            ->where('user_id', Auth::id())
            ->update([
                'total_skor' => $nilai,
                'completed_at' => now(),
            ]);
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
        $pakets = Auth::user()->role == 2
            ? Paket::where('user_id', Auth::id())->get()
            : Paket::all();

        return view('paket.index', [
            'title' => 'Daftar Paket Soal',
            'pakets' => $pakets,
        ]);
    }

    public function create()
    {
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
