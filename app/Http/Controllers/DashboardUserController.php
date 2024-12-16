<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $agent = new Agent();

        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);
        $os = $agent->platform();
        $osversi = $agent->version($os);

        // $data = [
        //     'browser' => $browser,
        //     'browserversi' => $browserVersion,
        //     'os' => $os,
        //     'osversi' => $osversi,
        // ];

        return view('halaman.pengguna.index', [
            'browser' => $browser,
            'browserversi' => $browserVersion,
            'os' => $os,
            'osversi' => $osversi,
            'user' => $request->user(),
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
