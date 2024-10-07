<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use App\Models\Jawaban;
use App\Models\Paket;
use Illuminate\Support\Facades\Gate;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Paket $paket)
    {
        return view('soal.index', ['title' => $paket->nama, 'paket' => $paket, 'soals' => Soal::where('paket_id', $paket->id)->orderBy('kategori_id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Paket $paket)
    {
        // Gate::authorize('create', [Soal::class, $paket]);
        return view('soal.create', ['title' => 'Tambah Soal', 'paket' => $paket]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSoalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket, Soal $soal)
    {
        return view('soal.edit', ['title' => 'Ubah Soal', 'paket' => $paket, 'soal' => $soal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoalRequest $request, Soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket, Soal $soal)
    {
        Jawaban::where('soal_id', $soal->id)->delete();
        $soal->delete();
        return redirect()->route('paket.soal.index', ['paket' => Paket::where('id', $paket->id)->first()->uuid])->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Soal berhasil dihapus!');
    }
}
