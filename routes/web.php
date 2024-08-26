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
use Illuminate\Support\Facades\File;

Route::get('/logs', function () {
    // Path to the Laravel log file
    $logFile = storage_path('logs/laravel.log');

    // Check if the log file exists
    if (File::exists($logFile)) {
        // Read the log file
        $logs = File::get($logFile);

        // Optionally, limit the log output
        // $logs = collect(explode("\n", $logs))->take(-50)->implode("\n");

        // Define terminal-like CSS styles
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

        // Display logs in a terminal-like format
        $content = "
            <html>
            <head>
                <title>Laravel Logs</title>
                <style>{$style}</style>
            </head>
            <body>
                <div class='log-container'>
                    <pre>" . e($logs) . "</pre>
                </div>
            </body>
            </html>
        ";

        return response($content);
    } else {
        return "Log file not found.";
    }
});

Route::get('/', function () {
    $option = Pengaturan::first();
    return view('home.index', [
        'title' => $option->nama
    ]);
});

Auth::routes(['verify' => true]);

// Route::get('/dashboard', function () {
//     return view('livewire.layout.body');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('panel', [PanelController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('guru', GuruController::class)->middleware(['admin', 'verified']);

Route::resource('siswa', SiswaController::class)->middleware(['guru', 'verified']);

Route::get('paket/publish/{paket}', [PaketController::class, 'publish'])->middleware(['guru', 'verified'])->name('publish');
Route::get('paket/hasil/{paket}', [PaketController::class, 'hasil'])->middleware(['auth', 'verified'])->name('hasil');
Route::get('paket/test/{paket}', [PaketController::class, 'testIndex'])->middleware(['siswa', 'verified']);
Route::get('paket/test/{paket}/play', [PaketController::class, 'test'])->middleware(['siswa', 'verified'])->name('play');
Route::get('paket/test/{paket}/selesai', [PaketController::class, 'selesai'])->middleware(['siswa', 'verified'])->name('ujian.selesai');
Route::resource('paket', PaketController::class)->middleware(['auth', 'verified']);
Route::resource('paket.soal', SoalController::class)->middleware(['auth', 'verified']);

Route::get('pengaturan', [PengaturanController::class, 'index'])->middleware(['admin', 'verified'])->name('settings');
Route::get('/profil', [ProfilController::class, 'index'])->middleware(['auth', 'verified'])->name('profil');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









require __DIR__ . '/auth.php';
