<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaturanController;
use App\Models\Pengaturan;

Route::get('/', function () {
    $option = Pengaturan::first();
    // $old = file_get_contents(public_path('home/css/styles.css'));
    // $newScssContent = str_replace('#0d6efd', $option->primary, $old);
    // file_put_contents((public_path('home/css/styles.css')), $newScssContent);
    // dd(file_get_contents(public_path('home/css/styles.css')));
    return view('home.index', [
        'title' => $option->nama
    ]);
});

Auth::routes(['verify' => true]);

// Route::get('/dashboard', function () {
//     return view('livewire.layout.body');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('panel', [PanelController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('guru', GuruController::class)->middleware(['auth', 'verified']);

Route::resource('siswa', SiswaController::class)->middleware(['auth', 'verified']);

Route::get('paket/publish/{paket}', [PaketController::class, 'publish'])->middleware(['auth', 'verified'])->name('publish');
Route::get('paket/hasil/{paket}', [PaketController::class, 'hasil'])->middleware(['auth', 'verified'])->name('hasil');
Route::get('paket/test/{paket}', [PaketController::class, 'testIndex'])->middleware(['auth', 'verified']);
Route::get('paket/test/{paket}/play', [PaketController::class, 'test'])->middleware(['auth', 'verified'])->name('play');
Route::get('paket/test/{paket}/selesai', [PaketController::class, 'selesai'])->middleware(['auth', 'verified'])->name('ujian.selesai');
Route::resource('paket', PaketController::class)->middleware(['auth', 'verified']);
Route::resource('paket.soal', SoalController::class)->middleware(['auth', 'verified']);

Route::get('pengaturan', [PengaturanController::class, 'index'])->middleware(['auth', 'verified'])->name('settings');
Route::get('/profil', [ProfilController::class, 'index'])->middleware(['auth', 'verified'])->name('profil');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









require __DIR__ . '/auth.php';
