<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Foto;
use App\Models\User;
use App\Models\Vidio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $count_user = User::role('pengguna')->count();
        $count_foto = Foto::all()->count();
        $count_vidio = Vidio::all()->count();
        $count_file = File::all()->count();


        return view('halaman.admin.index', [
            'count_user' => $count_user,
            'count_foto' => $count_foto,
            'count_vidio' => $count_vidio,
            'count_file' => $count_file,
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
        //
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
