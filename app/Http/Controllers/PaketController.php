<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Hasil;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;

class PaketController extends Controller
{

    public function testIndex(Paket $paket)
    {
        // dd($paket);
        return view('paket.testIndex', ['title' => $paket->nama, 'paket' => $paket, 'user' => Auth::user()]);
    }
    public function selesai(Paket $paket)
    {
        dd($paket);
        return view('paket.testIndex', ['title' => $paket->nama, 'paket' => $paket, 'user' => Auth::user()]);
    }
    public function test(Paket $paket)
    {

        if (Hasil::where('paket_id', $paket->id)->where('user_id', Auth::user()->id)->get()->count() == 0) {
            $twk = Soal::where('paket_id', $paket->id)->where('kategori_id', 1)->get()->shuffle();
            $tiu = Soal::where('paket_id', $paket->id)->where('kategori_id', 2)->get()->shuffle();
            $tkp = Soal::where('paket_id', $paket->id)->where('kategori_id', 3)->get()->shuffle();
            $soalsSorted = $twk->merge($tiu)->merge($tkp);
            $urutan = [];
            foreach ($soalsSorted as $soal) {
                $urutan[] = $soal->id;
            }
            $urutanString = implode(',', $urutan);
            $hasil = new Hasil();
            $hasil->user_id = Auth::user()->id;
            $hasil->paket_id = $paket->id;
            $hasil->urutan = $urutanString;
            $hasil->save();
        } else {
            $urutanArray = explode(',', Hasil::where('paket_id', $paket->id)->where('user_id', Auth::user()->id)->first()->urutan);
            $soals = Soal::whereIn('id', $urutanArray)->get();
            $soalsSorted = $soals->sortBy(function ($soal) use ($urutanArray) {
                return array_search($soal->id, $urutanArray);
            })->values();
        }
        return view('paket.test', ['title' => $paket->nama, 'paket' => $paket, 'user' => Auth::user(), 'soals' => $soalsSorted]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $pakets = Paket::all();
        } elseif (Auth::user()->role == 2) {
            $pakets = Paket::where('user_id', Auth::user()->id);
        } else {
            $pakets = Paket::all();
        }
        return view('paket.index', ['title' => 'Daftar Paket Soal', 'pakets' => $pakets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket.create', ['title' => 'Tambah Paket Soal']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        //
    }
}
