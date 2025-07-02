<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rute ini akan mengembalikan daftar pertanyaan secara acak (tetap di sini)
Route::get('/questions', [GameApiController::class, 'getQuestions']);

// Rute untuk menyimpan skor telah dipindahkan ke routes/web.php
// untuk menggunakan autentikasi sesi web yang lebih andal dalam konteks ini.

// Rute default untuk info user yang sedang login
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
