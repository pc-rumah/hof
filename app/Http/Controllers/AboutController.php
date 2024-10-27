<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::first();
        $kategori = Kategori::all();
        return view('konten.about', compact('data', 'kategori'));
    }
}
