<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FilePage extends Controller
{
    public function index()
    {
        $file = File::all();
        $kategori = Kategori::all();
        return view('halaman.filepage.index', compact('kategori', 'file'));
    }

    public function detail($id)
    {
        $kategori = Kategori::all();
        $file = File::findorfail($id);
        return view('halaman.filepage.detail', compact('file', 'kategori'));
    }
}
