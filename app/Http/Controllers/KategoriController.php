<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use App\Models\BaseKategori;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            'title' => 'Daftar Kategori',
            'bases' => BaseKategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $type)
    {
        $kategori = $type == 'base' ? BaseKategori::find($id) : Kategori::find($id);
        return view('kategori.edit', ['kategori' => $kategori, 'title' => 'Ubah Kategori', 'type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        Gate::allowIf(Auth::user()->role == 1);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Sub kategori berhasil dihapus!');
    }
    public function destroyBase(BaseKategori $base)
    {
        Gate::allowIf(Auth::user()->role == 1);
        $base->delete();
        return redirect()->route('kategori.index')->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Kategori berhasil dihapus!');
    }
}
