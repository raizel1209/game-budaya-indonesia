<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameApiController; // Kita akan buat controller ini

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Rute ini akan mengembalikan daftar pertanyaan secara acak
Route::get('/questions', [GameApiController::class, 'getQuestions']);

// Rute ini memerlukan user untuk login (middleware auth:sanctum) untuk menyimpan skor
Route::middleware('auth:sanctum')->post('/scores', [GameApiController::class, 'storeScore']);

// Rute default untuk info user yang sedang login
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});