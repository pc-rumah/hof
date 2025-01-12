<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Foto;
use App\Models\User;
use App\Models\Vidio;
use App\Models\Kategori;
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

        // Dapatkan gambar dan vidio berdasarkan kategori
        $gambar = Foto::where('kategori_id', $kategorii->id)->get();
        $vidio = Vidio::where('kategori_id', $kategorii->id)->get();

        // Jika baik gambar maupun vidio tidak ditemukan, kembalikan pesan bahwa konten tidak tersedia
        if ($gambar->isEmpty() && $vidio->isEmpty()) {
            return view('halaman.pengguna.kosong', compact('gambar', 'vidio', 'kategori', 'kategorii'))
                ->with('message', 'Konten tidak tersedia untuk kategori ini.');
        }

        // Kembalikan view dengan data gambar dan vidio yang difilter
        return view('halaman.pengguna.kategori', compact('gambar', 'kategori', 'kategorii', 'vidio'));
    }

    public function edit(Request $request, string $id)
    {
        $data = Kategori::find($id);
        return view('halaman.admin.kategori.edit', [
            'data' => $data,
            'user' => $request->user()
        ]);
    }

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

    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori Tidak diTemukan');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Berhasil Menghapus Kategori');
    }
}
