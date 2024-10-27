<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Kategori;
use App\Models\Vidio;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $foto = Foto::all();
        $kategori = Kategori::all();
        $vidio = Vidio::all();
        $kategori = Kategori::all();
        // $data = [
        //     'foto' => $foto,
        //     'kategori' => $kategori,
        // ];
        return view('welcome', compact('foto', 'kategori', 'vidio', 'kategori'));
    }
}
