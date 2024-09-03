<?php

namespace App\Http\Controllers;

use App\Models\Vidio;
use Illuminate\Http\Request;

class DetailVidioController extends Controller
{
    public function show($id)
    {
        $vidio = Vidio::findOrFail($id);
        return view('halaman.detail-vidio.index', compact('vidio'));
    }
}
