<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TambahFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('error')) {
            session()->flash('error', $request->query('error'));
        }

        $data = Foto::where('user_id', Auth::id())->get();
        return view('halaman.pengguna.tambah-foto.index', [
            'data' => $data,
            'user' => $request->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = Kategori::all();
        return view('halaman.pengguna.tambah-foto.create', [
            'data' => $data,
            'user' => $request->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validator = \Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        // Jika validasi gagal, kirim respon JSON dengan error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Menyimpan file foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/fotos', $filename, 'public');
        }

        // Simpan data ke database
        Foto::create([
            'judul' => $request->input('judul'),
            'kategori_id' => $request->input('kategori'),
            'user_id' => auth()->user()->id,
            'foto' => $filePath ?? null,
            'deskripsi' => $request->input('deskripsi'),
        ]);

        // Kirim respon sukses dalam format JSON
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Foto berhasil ditambahkan!',
        // ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('tambahfoto.index')->with('success', 'Foto berhasil ditambahkan!');
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
    public function edit(Request $request, string $id)
    {
        // Ambil data foto berdasarkan ID
        $foto = Foto::find($id);

        // Pastikan data foto ditemukan
        if (!$foto) {
            abort(404, 'Foto tidak ditemukan');
        }

        // Current user
        $user = auth()->user();

        // Authorization: pastikan user yang sedang login adalah pemilik foto
        if ($user->id !== $foto->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit foto ini');
        }

        $kategori = Kategori::all();

        $data = [
            'foto' => $foto,
            'kategori' => $kategori,
        ];

        return view('halaman.pengguna.tambah-foto.edit', [
            'foto' => $foto,
            'kategori' => $kategori,
            'user' => $request->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validator = \Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data foto yang akan diupdate
        $foto = Foto::find($id);

        // Pastikan data foto ditemukan
        if (!$foto) {
            abort(404, 'Foto tidak ditemukan');
        }

        // Current user
        $user = auth()->user();

        // Authorization: pastikan user yang sedang login adalah pemilik foto
        if ($user->id !== $foto->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit foto ini');
        }

        // Periksa apakah ada file foto baru yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($foto->foto) {
                Storage::disk('public')->delete($foto->foto);
            }

            // Simpan file foto baru
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/fotos', $filename, 'public');

            // Update path foto di database
            $foto->foto = $filePath;
        }

        // Update data lainnya di database
        $foto->judul = $request->input('judul');
        $foto->kategori_id = $request->input('kategori');
        $foto->deskripsi = $request->input('deskripsi');
        $foto->save();

        // Redirect setelah berhasil mengupdate
        return redirect()->route('tambahfoto.index')->with('success', 'Foto berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // Ambil data foto yang akan dihapus
        $foto = Foto::find($id);
        $user = auth()->user();
        $foto->user_id = $user->id;
        // Pastikan data foto ditemukan
        if (!$foto) {
            abort(404, 'Foto tidak ditemukan');
        }

        // Authorization: pastikan user yang sedang login adalah pemilik foto
        if ($user->id !== $foto->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus foto ini');
        }
        // dd($foto);
        // Hapus foto dari database
        $foto->delete();

        // Hapus file foto dari storage
        if ($foto->foto) {
            Storage::disk('public')->delete($foto->foto);
        }

        // Redirect setelah berhasil menghapus
        return redirect()->route('tambahfoto.index')->with('success', 'Foto berhasil dihapus');
    }
}
