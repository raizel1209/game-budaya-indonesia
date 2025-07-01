<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Menampilkan halaman permainan.
     */
    public function index()
    {
        return view('game');
    }
}