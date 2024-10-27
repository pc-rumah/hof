<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data about milik user yang sedang login
        $about = About::where('user_id', auth()->user()->id)->first();

        // Mengirim data about ke view
        return view('halaman.admin.about.index', [
            'about' => $about,
            'user' => $request->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'notelp' => 'required|numeric',
            'kota' => 'required|string|max:255',
        ]);

        // Cek apakah user sudah memiliki data about
        $about = About::where('user_id', auth()->user()->id)->first();

        if ($about) {
            // Jika data sudah ada, update data tersebut
            if ($request->hasFile('image')) {
                // Hapus foto lama jika ada
                if ($about->image && Storage::exists('profile_images/' . $about->image)) {
                    Storage::delete('profile_images/' . $about->image);
                }

                // Simpan foto baru dengan nama asli
                $fotoName = time() . '_' . $request->image->getClientOriginalName();
                $request->image->move(public_path('profile_images'), $fotoName);
                $about->image = $fotoName;
            }

            $about->title = $validatedData['title'];
            $about->description = $validatedData['deskripsi'];
            $about->notelp = $validatedData['notelp'];
            $about->kota = $validatedData['kota'];
            $about->save();

            return redirect()->route('editabout.index')->with('success', 'About updated successfully!');
        } else {
            // Jika data belum ada, simpan data baru
            $about = new About;
            $about->user_id = auth()->user()->id;

            if ($request->hasFile('image')) {
                $fotoName = time() . '_' . $request->image->getClientOriginalName();
                $request->image->move(public_path('profile_images'), $fotoName);
                $about->image = $fotoName;
            }

            $about->title = $validatedData['title'];
            $about->description = $validatedData['deskripsi'];
            $about->notelp = $validatedData['notelp'];
            $about->kota = $validatedData['kota'];
            $about->save();

            return redirect()->route('editabout.index')->with('success', 'About created successfully!');
        }
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
