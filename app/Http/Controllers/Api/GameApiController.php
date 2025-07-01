<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameApiController extends Controller
{
    /**
     * Mengambil sejumlah pertanyaan acak dari database.
     */
    public function getQuestions()
    {
        // Ambil 15 soal secara acak dari database
        // Pastikan untuk mengacak pilihan jawaban juga nanti di sisi JavaScript
        $questions = Question::inRandomOrder()->limit(15)->get();
        
        // Mengubah string JSON 'options' menjadi array PHP sebelum dikirim
        $questions->transform(function ($question) {
            $question->options = json_decode($question->options);
            return $question;
        });

        return response()->json($questions);
    }

    /**
     * Menyimpan skor pemain yang sedang login.
     */
    public function storeScore(Request $request)
    {
        // Validasi input: pastikan 'score' ada dan berupa angka
        $validated = $request->validate([
            'score' => 'required|integer|min:0',
        ]);

        // Dapatkan user yang sedang terautentikasi
        $user = Auth::user();

        // Buat record skor baru yang terhubung dengan user_id
        $score = Score::create([
            'user_id' => $user->id,
            'score' => $validated['score'],
        ]);

        // Beri respon sukses
        return response()->json([
            'message' => 'Skor berhasil disimpan!',
            'score' => $score,
        ], 201); // 201 artinya "Created"
    }
}