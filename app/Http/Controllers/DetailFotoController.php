<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DetailFotoController extends Controller
{
    public function show($id)
    {
        $foto = Foto::findOrFail($id);
        $kategori = Kategori::all();
        return view('halaman.detail-foto.index', compact('foto', 'kategori'));
    }
}
