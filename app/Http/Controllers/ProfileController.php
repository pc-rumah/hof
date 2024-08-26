<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // \Log::info($request->all());
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'Profile updated successfully.');
    }


    public function updatephoto(Request $request)
    {
        // Validasi input
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Hapus foto lama jika ada
        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }

        // Simpan foto baru
        $path = $request->file('photo')->store('profile_images', 'public');

        // Update kolom 'photo' pada tabel 'users'
        $user->photo = $path;
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }

    public function destroyphoto()
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Hapus foto lama jika ada dan bukan default
        if ($user->photo && $user->photo !== 'profile_images/default.jpg' && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }

        // Set foto profile ke nilai default
        $user->photo = 'profile_images/default.jpg';
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Profile image has been removed and set to default.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
