<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SoalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Route::get('/dashboard', function () {
//     return view('livewire.layout.body');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('panel', [PanelController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('guru', GuruController::class)->middleware(['auth', 'verified']);
Route::resource('siswa', SiswaController::class)->middleware(['auth', 'verified']);
Route::resource('paket', PaketController::class)->middleware(['auth', 'verified']);
Route::resource('paket.soal', SoalController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









require __DIR__ . '/auth.php';
