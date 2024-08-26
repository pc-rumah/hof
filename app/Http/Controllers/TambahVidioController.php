<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Vidio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TambahVidioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vidio::where('user_id', Auth::user()->id)->get();
        return view('halaman.pengguna.tambah-vidio.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Kategori::all();
        return view('halaman.pengguna.tambah-vidio.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'durasi_menit' => 'required|integer|min:0',
            'durasi_detik' => 'required|integer|min:0|max:59',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vidio' => 'required|mimes:mp4,mov,ogg,qt|max:20000',
            'kategori' => 'required|exists:kategori,id',
        ]);

        // Handle file upload for thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Handle file upload for video
        if ($request->hasFile('vidio')) {
            $videoPath = $request->file('vidio')->store('vidios', 'public');
        }

        // Gabungkan menit dan detik menjadi format yang diinginkan, misalnya dalam detik
        $totalDurasi = ($request->input('durasi_menit') * 60) + $request->input('durasi_detik');

        // Simpan data ke database
        Vidio::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'durasi' => $totalDurasi, // Durasi dalam detik
            'thumbnail' => $thumbnailPath ?? null,
            'video' => $videoPath ?? null,
            'views' => 0,
            'tanggal_upload' => now(),
            'kategori_id' => $request->input('kategori'),
            'user_id' => auth()->user()->id,
        ]);

        // Redirect atau response setelah berhasil menyimpan
        return redirect()->route('tambahvidio.index')->with('success', 'Vidio berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $video = Vidio::findOrFail($id);

        // Increment the views count
        $video->increment('views');

        return view('#', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
