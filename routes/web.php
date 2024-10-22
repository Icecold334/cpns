<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuruController,
    SoalController,
    PaketController,
    PanelController,
    SiswaController,
    ProfilController,
    ProfileController,
    PengaturanController,
    KategoriController
};
use App\Models\Pengaturan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

Auth::routes(['verify' => true]);
Route::get('/', fn() => view('home.index', ['option' => Pengaturan::first()]));
Route::get('panel', [PanelController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('test', function () {
    return view('wind');
});
Route::resource('guru', GuruController::class)->middleware(['admin', 'verified']);
Route::resource('siswa', SiswaController::class)->middleware(['guru', 'verified']);
Route::prefix('paket')->middleware(['auth', 'verified'])->group(function () {
    Route::get('{paket}/list', [PaketController::class, 'list'])->name('list');
    Route::get('publish/{paket}', [PaketController::class, 'publish'])->middleware('guru')->name('publish');
    Route::get('hasil/{paket}/{result}', [PaketController::class, 'hasil'])->name('hasil');
    Route::middleware('siswa')->group(function () {
        Route::get('test/{paket}', [PaketController::class, 'testIndex']);
        Route::get('test/{paket}/play', [PaketController::class, 'test'])->name('play');
        Route::get('test/{paket}/{result}/selesai', [PaketController::class, 'selesai'])->name('ujian.selesai');
    });
});
Route::resource('paket', PaketController::class)->middleware(['auth', 'verified']);
Route::delete('kategori/base/{base}', [KategoriController::class, 'destroyBase'])->name('base.destroy');
Route::get('kategori/{id}/{type}/edit', [KategoriController::class, 'edit'])->middleware(['admin', 'guru', 'verified']);
Route::resource('kategori', KategoriController::class)->middleware(['auth', 'verified']);
Route::resource('paket.soal', SoalController::class)->middleware(['auth', 'verified']);
Route::get('pengaturan', [PengaturanController::class, 'index'])->middleware(['admin', 'verified'])->name('settings');
// Route::get('profil', [ProfilController::class, 'index'])->middleware(['auth', 'verified'])->name('profil');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'index'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::get('/logs', function () {
    $logFile = storage_path('logs/laravel.log');
    if (File::exists($logFile)) {
        $logs = File::get($logFile);
        // Limit output (optional)
        // $logs = collect(explode("\n", $logs))->take(-50)->implode("\n");
        $style = "
            body {
                background-color: #1e1e1e;
                color: #c5c5c5;
                font-family: 'Courier New', Courier, monospace;
                font-size: 14px;
                padding: 10px;
            }
            .log-container {
                background-color: #2e2e2e;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                overflow-x: auto;
            }
            .log-container pre {
                white-space: pre-wrap;
            }
        ";
        $content = "<html><head><title>Laravel Logs</title><style>{$style}</style></head><body><div class='log-container'><pre>" . e($logs) . "</pre></div></body></html>";
        return response($content);
    } else {
        return "Log file not found.";
    }
});


require __DIR__ . '/auth.php';
