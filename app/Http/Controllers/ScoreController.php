<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    /**
     * Menampilkan halaman papan skor universal.
     */
    public function index()
    {
        // Ambil skor tertinggi untuk setiap user, diurutkan dari yang paling tinggi
        $scores = Score::with('user') // 'user' adalah nama relasi di model Score
            ->select('user_id', DB::raw('MAX(score) as max_score'))
            ->groupBy('user_id')
            ->orderBy('max_score', 'desc')
            ->take(20) // Ambil 20 pemain teratas
            ->get();

        return view('scores', ['scores' => $scores]);
    }
}