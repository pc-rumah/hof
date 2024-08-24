<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class DetailFotoController extends Controller
{
    public function show($id)
    {
        $foto = Foto::findOrFail($id);
        return view('halaman.detail-foto.index', compact('foto'));
    }
}
