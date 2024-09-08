<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

use function Laravel\Prompts\text;

class EditKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::where('user_id', auth()->user()->id)->first();
        return view('halaman.admin.kontak.index', compact('kontak'));
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
        $validatedData = $request->validate([
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'github' => 'required|string|max:255',
        ], [
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_telp.required' => 'No Telp tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'github.required' => 'Github tidak boleh kosong',
        ]);

        $kontak = Kontak::where('user_id', auth()->user()->id)->first();

        if ($kontak) {
            // Update existing record
            $kontak->alamat = $validatedData['alamat'];
            $kontak->no_telp = $validatedData['no_telp'];
            $kontak->email = $validatedData['email'];
            $kontak->github = $validatedData['github'];
            $kontak->save();

            return redirect()->route('editkontak.index')->with('success', 'Info Kontak Berhasil di update');
        } else {
            // Create new record
            $kontak = new Kontak;
            $kontak->user_id = auth()->user()->id;
            $kontak->alamat = $validatedData['alamat'];
            $kontak->no_telp = $validatedData['no_telp'];
            $kontak->email = $validatedData['email'];
            $kontak->github = $validatedData['github'];
            $kontak->save(); // Pastikan untuk menyimpan data

            return redirect()->route('editkontak.index')->with('success', 'Info Kontak Berhasil di Tambah');
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
