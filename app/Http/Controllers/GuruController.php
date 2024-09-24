<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('guru.index', ['title' => 'Daftar Guru', 'gurus' => User::where('role', 2)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create', ['title' => 'Tambah Guru']);
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
    public function show(User $guru)
    {
        return view('guru.show', ['title' => 'Detail Guru', 'user' => $guru]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $guru)
    {
        return view('guru.edit', ['title' => "Ubah $guru->name", 'user' => $guru]);
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
    public function destroy(User $guru)
    {
        Gate::allowIf(Auth::user()->role == 1);


        $guru->delete();
        return redirect()->route('guru.index')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $guru->name . ' berhasil dihapus!');
    }
}
