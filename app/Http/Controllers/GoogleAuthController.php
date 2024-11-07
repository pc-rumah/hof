<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function googleauth()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback dari Google
    public function googlecallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Jika user sudah ada, login langsung
                Auth::login($user);
            } else {
                // Jika user belum ada, buat user baru dan tandai sebagai terverifikasi
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('123456dummy'),
                    'email_verified_at' => now() // Menandai email sebagai terverifikasi
                ]);

                // Berikan role "pengguna"
                $user->assignRole('pengguna');

                // Memicu event Registered untuk aplikasi jika diperlukan
                event(new Registered($user));
            }

            // Pastikan user terverifikasi (hanya untuk login Google)
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }

            return redirect()->intended('pengguna'); // Redirect ke halaman pengguna
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Error during Google login.']);
        }
    }
}
