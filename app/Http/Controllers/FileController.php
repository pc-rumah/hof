<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\KategoriFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $file = File::where('user_id', Auth::id())->get();
        return view('halaman.pengguna.tambah-file.index', [
            'file' => $file,
            'user' => $request->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = KategoriFile::all();
        return view('halaman.pengguna.tambah-file.create', [
            'data' => $data,
            'user' => $request->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori_file,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|file|max:400000',
            'deskripsi' => 'nullable|string',
        ]);

        $file = new File();
        $file->user_id = auth()->id();
        $file->judul = $request->input('judul');
        $file->kategori_file_id = $request->input('kategori');
        $file->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $filePath = $uploadedFile->store('files', 'public');

            $file->file_path = $filePath; // Path file yang di-hash
            $file->nama_asli = $uploadedFile->getClientOriginalName(); // Simpan nama asli
            $file->size = $uploadedFile->getSize(); // Simpan ukuran file
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $file->thumbnail = $thumbnailPath;
        }

        $file->save();

        return response()->json(['success' => true, 'message' => 'File berhasil ditambahkan']);
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $file = File::findOrFail($id);
        $kategori = KategoriFile::all();
        return view('halaman.pengguna.tambah-file.edit', [
            'file' => $file,
            'kategori' => $kategori,
            'user' => $request->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori_file,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|file|max:400000', // Maksimum ukuran file 400MB
            'deskripsi' => 'nullable|string',
        ]);

        // Update field dengan data baru
        $file->judul = $request->input('judul');
        $file->kategori_file_id = $request->input('kategori');
        $file->deskripsi = $request->input('deskripsi');
        $file->user_id = auth()->id(); // Pastikan ini tidak membuat record baru

        // Proses file thumbnail jika di-upload
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($file->thumbnail) {
                Storage::disk('public')->delete($file->thumbnail);
            }

            // Simpan thumbnail baru
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $file->thumbnail = $thumbnailPath;
        }

        // Proses file jika di-upload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($file->file_path) {
                Storage::disk('public')->delete($file->file_path);
            }

            // Simpan file baru
            $filePath = $request->file('file')->store('files', 'public');
            $file->file_path = $filePath;
        }

        // Simpan perubahan
        $file->save(); // ini seharusnya memperbarui, bukan membuat baru

        // Redirect atau kembalikan respons sesuai kebutuhan
        return redirect()->route('tambahfile.index')->with('success', 'File berhasil diperbarui');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Ambil data foto yang akan dihapus
        $file = File::find($id);
        $user = auth()->user();
        $file->user_id = $user->id;
        // Pastikan data foto ditemukan
        if (!$file) {
            abort(404, 'File tidak ditemukan');
        }

        // Authorization: pastikan user yang sedang login adalah pemilik foto
        if ($user->id !== $file->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus file ini');
        }
        // dd($file);
        // Hapus foto dari database
        $file->delete();

        // Hapus file foto dari storage
        if ($file->thumbnail) {
            Storage::disk('public')->delete($file->thumbnail);
        }

        if ($file->file_path) {
            Storage::disk('public')->delete($file->file_path);
        }

        // Redirect setelah berhasil menghapus
        return redirect()->route('tambahfile.index')->with('success', 'File berhasil dihapus');
    }
}
