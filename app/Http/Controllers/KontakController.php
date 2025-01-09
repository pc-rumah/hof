<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $data = Kontak::first();
        $kategori = Kategori::all();
        return view('konten.kontak', compact('data', 'kategori'));
    }
}
