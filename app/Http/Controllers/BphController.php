<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BphController extends Controller
{
    // Tampilkan semua prestasi
    public function index()
    {
        return view('pages.bph');
    }
}