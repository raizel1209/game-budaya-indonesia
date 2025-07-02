<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score; // Tetap dipertahankan jika dibutuhkan di tempat lain, namun tidak untuk gameOver
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Menampilkan halaman permainan.
     */
    public function index()
    {
        return view('game');
    }

    /**
     * Menampilkan halaman game over.
     * Logika penyimpanan skor telah dipindahkan ke ScoreController via API.
     */
    public function gameOver(Request $request)
    {
        // Hanya mengambil skor dari query URL untuk ditampilkan
        $score = $request->query('score', 0);
        
        // Kirim skor ke view untuk ditampilkan
        return view('game-over', ['score' => $score]);
    }
}