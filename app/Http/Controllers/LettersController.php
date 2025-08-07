<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LettersController extends Controller
{
    // Tampilkan semua prestasi
    public function index()
    {
        return view('pages.letters');
    }
}