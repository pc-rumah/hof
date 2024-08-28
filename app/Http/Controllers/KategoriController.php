<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::all();
        return view('halaman.admin.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.admin.kategori.create');
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
