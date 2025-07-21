<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EducationController extends Controller
{
    /**
     * Menampilkan halaman edukasi yang berisi semua materi dari pertanyaan.
     */
    public function index(): View
    {
        // Ambil semua pertanyaan, lalu kelompokkan berdasarkan kategori
        $groupedQuestions = Question::all()->groupBy('category');

        // Kirim data yang sudah dikelompokkan ke view
        return view('belajar', ['groupedQuestions' => $groupedQuestions]);
    }
}
