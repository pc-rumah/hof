<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Kategori;
use App\Models\Vidio;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Kategori::all();
        return view('halaman.admin.kategori.index', [
            'data' => $data,
            'user' => $request->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('halaman.admin.kategori.create', [
            'user' => $request->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'nama_kategori.required' => 'Nama Kategori tidak boleh kosong',
            ]
        );
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function filterByCategory($nama_kategori)
    {
        // Cari kategori berdasarkan nama
        $kategorii = Kategori::where('nama_kategori', $nama_kategori)->first();
        $kategori = Kategori::all();

        if (!$kategorii) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan.');
        }

        // Dapatkan gambar berdasarkan kategori
        $gambar = Foto::where('kategori_id', $kategorii->id)->get();
        $vidio = Vidio::where('kategori_id', $kategorii->id)->get();

        if ($gambar->isEmpty()) {
            // Jika gambar tidak ditemukan, Anda dapat mengembalikan halaman dengan pesan
            return view('halaman.pengguna.kategori', compact('kategori', 'kategorii'))
                ->with('message', 'Tidak ada gambar yang ditemukan untuk kategori ini.');
        }

        // Kembalikan view dengan data gambar yang difilter
        return view('halaman.pengguna.kategori', compact('gambar', 'kategori', 'kategorii', 'vidio'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kategori::find($id);
        return view('halaman.admin.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_kategori' => 'required',
            ]
        );
        Kategori::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
