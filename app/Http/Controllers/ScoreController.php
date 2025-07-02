<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    /**
     * Menampilkan halaman papan skor universal.
     * Metode ini diperbarui agar lebih aman dan efisien.
     */
    public function index()
    {
        // Langkah 1: Ambil data skor tertinggi untuk setiap user_id.
        // Ini menghasilkan koleksi objek standar dengan user_id dan max_score.
        $topScoresData = DB::table('scores')
            ->select('user_id', DB::raw('MAX(score) as max_score'))
            ->whereNotNull('user_id')
            ->groupBy('user_id')
            ->orderBy('max_score', 'desc')
            ->take(20) // Ambil 20 skor teratas
            ->get();

        // Langkah 2: Ambil semua ID pengguna dari hasil di atas.
        $userIds = $topScoresData->pluck('user_id');

        // Langkah 3: Ambil semua model User yang sesuai dalam satu query,
        // lalu ubah menjadi koleksi yang diindeks berdasarkan ID untuk pencarian cepat.
        $users = User::whereIn('id', $userIds)->get()->keyBy('id');

        // Langkah 4: Gabungkan data skor dengan data pengguna.
        // Ini adalah langkah paling aman untuk mencegah error jika ada pengguna yang telah dihapus.
        $scores = $topScoresData->map(function ($scoreData) use ($users) {
            // Cek apakah pengguna untuk skor ini ada.
            if (isset($users[$scoreData->user_id])) {
                // Buat objek baru yang strukturnya sesuai dengan yang dibutuhkan oleh view.
                $scoreObject = new \stdClass();
                $scoreObject->user = $users[$scoreData->user_id]; // Tambahkan model User
                $scoreObject->max_score = $scoreData->max_score; // Tambahkan skor maksimal
                return $scoreObject;
            }
            // Jika pengguna tidak ditemukan (telah dihapus), kembalikan null.
            return null;
        })->filter(); // Hapus semua entri null dari koleksi.

        return view('scores', ['scores' => $scores]);
    }

    /**
     * Menyimpan skor baru untuk pengguna yang sedang login.
     * Metode ini diperbaiki untuk menghapus duplikasi kode.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|integer|min:0',
        ]);

        $user = Auth::user();

        if ($user) {
            Score::create([
                'user_id' => $user->id,
                'score' => $validated['score'],
            ]);
            return response()->json(['message' => 'Skor berhasil disimpan!'], 201);
        }

        // Jika user tidak login, jangan simpan skor
        return response()->json(['message' => 'Pengguna tidak terautentikasi.'], 401);
    }
}
