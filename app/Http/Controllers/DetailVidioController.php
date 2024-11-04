<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Vidio;
use Illuminate\Http\Request;

class DetailVidioController extends Controller
{
    public function show($id)
    {
        $vidio = Vidio::findOrFail($id);
        $kategori = Kategori::all();
        return view('halaman.detail-vidio.index', compact('vidio', 'kategori'));
    }
}
