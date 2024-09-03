<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Vidio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TambahVidioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vid = Vidio::all();
        $data = Vidio::where('user_id', Auth::user()->id)->get();
        return view('halaman.pengguna.tambah-vidio.index', compact('data', 'vid'));
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
            'durasi_menit' => 'required|numeric|min:0',
            'durasi_detik' => 'required|numeric|min:0|max:59',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vidio' => 'required|mimes:mp4,mov,ogg,qt|max:20000',
            'kategori' => 'required|exists:kategori,id',
        ]);

        // Handle file upload for thumbnail
        if ($request->hasFile('thumbnail')) {

            $namathumbnail = $request->file('thumbnail')->getClientOriginalName();

            $thumbnailPath = $request->file('thumbnail')->storeAs('thumbnails', $namathumbnail, 'public');
        }

        // Handle file upload for video
        if ($request->hasFile('vidio')) {
            // Dapatkan nama asli file video yang diupload
            $originalVideoName = $request->file('vidio')->getClientOriginalName();

            // Simpan file dengan nama asli ke folder 'vidios' di penyimpanan publik
            $videoPath = $request->file('vidio')->storeAs('vidios', $originalVideoName, 'public');
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

        // Kirim respon sukses dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Vidio berhasil ditambahkan!',
        ]);
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
        // Ambil data foto berdasarkan ID
        $vidio = Vidio::find($id);
        // Pastikan data foto ditemukan
        if (!$vidio) {
            abort(404, 'Foto tidak ditemukan');
        }
        // bagian durasi
        // if ($vidio->durasi) {
        //     // Pisahkan durasi menjadi jam, menit, dan detik
        //     list($hours, $minutes, $seconds) = explode(':', $vidio->durasi);
        // } else {
        //     // Jika durasi tidak ada atau null, set nilai default
        //     $hours = $minutes = $seconds = 0;
        // }
        // Current user
        $user = auth()->user();
        // Authorization: pastikan user yang sedang login adalah pemilik foto
        if ($user->id !== $vidio->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit foto ini');
        }
        $kategori = Kategori::all();
        $data = [
            'vidio' => $vidio,
            'kategori' => $kategori,
        ];
        return view('halaman.pengguna.tambah-vidio.edit', compact('vidio', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vidio $vidio)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|exists:kategori,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'vidio' => 'nullable|mimes:mp4,mkv,avi|max:20480', // 20MB max
            'deskripsi' => 'nullable|string',
        ]);

        // Update atribut
        $vidio->judul = $validated['judul'];
        $vidio->kategori_id = $validated['kategori'];
        $vidio->user_id = auth()->id(); // Tambahkan user_id

        // Tangani upload thumbnail
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($vidio->thumbnail && Storage::disk('public')->exists($vidio->thumbnail)) {
                Storage::disk('public')->delete($vidio->thumbnail);
            }

            // Simpan thumbnail baru
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $vidio->thumbnail = $thumbnailPath;
        }

        // Tangani upload video
        if ($request->hasFile('vidio')) {
            // Hapus video lama jika ada
            if ($vidio->video && Storage::disk('public')->exists($vidio->video)) {
                Storage::disk('public')->delete($vidio->video);
            }

            // Simpan video baru
            $vidioPath = $request->file('vidio')->store('vidios', 'public');
            $vidio->video = $vidioPath;
        }

        // Update deskripsi
        $vidio->deskripsi = $validated['deskripsi'] ?? $vidio->deskripsi;

        // Simpan perubahan
        $vidio->save(); // Pastikan save() digunakan untuk instance model

        // Redirect dengan pesan sukses
        return redirect()->route('tambahvidio.index')->with('success', 'Video berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Ambil data foto yang akan dihapus
        $vidio = Vidio::find($id);
        $user = auth()->user();
        $vidio->user_id = $user->id;
        // Pastikan data foto ditemukan
        if (!$vidio) {
            abort(404, 'Foto tidak ditemukan');
        }

        // Authorization: pastikan user yang sedang login adalah pemilik foto
        if ($user->id !== $vidio->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus foto ini');
        }

        // Hapus foto dari database
        $vidio->delete();

        // Hapus file foto dari storage
        // if ($vidio->foto) {
        //     Storage::disk('public')->delete($vidio->foto);
        // }

        // hapus thumbnail
        if ($vidio->thumbnail) {
            Storage::disk('public')->delete($vidio->thumbnail);
        }

        // hapus vidio
        if ($vidio->video) {
            Storage::disk('public')->delete($vidio->video);
        }

        // Redirect setelah berhasil menghapus
        return redirect()->route('tambahvidio.index')->with('success', 'Vidio berhasil dihapus');
    }
}
