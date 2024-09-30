<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa.index', ['title' => 'Daftar Siswa', 'siswas' => User::where('role', 3)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('admin');
        return view('siswa.create', ['title' => 'Tambah Siswa']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $siswa)
    {
        return view('siswa.show', ['title' => 'Detail Siswa', 'user' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $siswa)
    {
        Gate::allowIf(false);
        return view('siswa.edit', ['title' => "Ubah $siswa->name", 'user' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $siswa)
    {
        Gate::allowIf(Auth::user()->role == 1);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $siswa->name . ' berhasil dihapus!');
    }
}
