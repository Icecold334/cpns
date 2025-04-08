<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Paket;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreSoalRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateSoalRequest;

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

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:5120', // Maksimal 5MB
        ]);
        if ($request->hasFile('file')) {
            $path = str_replace('public', 'storage', $request->file('file')->store('public/soal'));
            return response()->json([
                'url' => asset($path)
            ]);
        }

        return response()->json(['error' => 'File not found'], 400);
    }
    public function delete(Request $request)
    {

        $fileUrl = $request->input('url');
        $filePath = str_replace('storage', 'public', parse_url($fileUrl, PHP_URL_PATH));

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'File tidak ditemukan.']);
    }
}
