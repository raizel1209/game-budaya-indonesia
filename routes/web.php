<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama untuk tamu (belum login)
Route::get('/', function () {
    return view('welcome');
});

// Grup rute yang memerlukan autentikasi (harus login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Halaman Dashboard setelah login
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Halaman utama untuk bermain game
    Route::get('/play', [GameController::class, 'index'])->name('game.play');
    
    // Rute untuk halaman Game Over
    Route::get('/game-over', [GameController::class, 'gameOver'])->name('game.over');

    // Halaman untuk melihat papan skor
    Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
    
    // Rute untuk manajemen profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // BARU: Rute API untuk menyimpan skor, kini menggunakan middleware 'web'
    // Ini memastikan autentikasi sesi digunakan, sehingga Auth::user() akan berfungsi.
    Route::post('/api/scores', [ScoreController::class, 'store'])->name('api.scores.store');
});


// Memuat rute autentikasi (login, register, dll) dari Breeze
require __DIR__.'/auth.php';
