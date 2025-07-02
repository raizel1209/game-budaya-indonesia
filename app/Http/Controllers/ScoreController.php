<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    /**
     * Menampilkan halaman papan skor universal.
     */
    public function index()
    {
        // Ambil skor tertinggi untuk setiap user, diurutkan dari yang paling tinggi
        $scores = Score::with('user')
            ->select('user_id', DB::raw('MAX(score) as max_score'))
            ->groupBy('user_id')
            ->orderBy('max_score', 'desc')
            ->take(20)
            ->get();

        return view('scores', ['scores' => $scores]);
    }

    /**
     * Menyimpan skor baru untuk pengguna yang sedang login.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|integer|min:0',
        ]);

        // Pastikan user terautentikasi sebelum menyimpan
        if (Auth::check()) {
            Score::create([
                'user_id' => Auth::id(), // Menggunakan Auth::id() lebih aman
                'score' => $validated['score'],
            ]);

            return response()->json(['message' => 'Skor berhasil disimpan!'], 201);
        }

        // Jika tidak terautentikasi, kembalikan error
        return response()->json(['message' => 'Pengguna tidak terautentikasi.'], 401);
    }
}
