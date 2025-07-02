<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score; // <-- Tambahkan ini
use Illuminate\Support\Facades\Auth; // <-- Tambahkan ini

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
     * Menampilkan halaman game over dan menyimpan skor.
     */
    public function gameOver(Request $request)
    {
        $score = $request->query('score', 0);

        // Pastikan user terautentikasi sebelum menyimpan
        if (Auth::check()) {
            Score::create([
                'user_id' => Auth::id(),
                'score' => $score,
            ]);
        }
        
        // Kirim skor ke view untuk ditampilkan
        return view('game-over', ['score' => $score]);
    }
}
