<?php

use App\Models\File;
use App\Http\Controllers\FilePage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TambahKategori;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditAboutController;
use App\Http\Controllers\DetailFotoController;
use App\Http\Controllers\EditKontakController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\TambahFotoController;
use App\Http\Controllers\TampilFileController;
use App\Http\Controllers\TampilFotoController;
use App\Http\Controllers\TampilUserController;
use App\Http\Controllers\DetailVidioController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TambahVidioController;
use App\Http\Controllers\TampilVidioController;
use App\Http\Controllers\DashboardUserController;

// halaman landing page
Route::get('/', [LandingPageController::class, 'index'])->name('welcome');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('/about', [AboutController::class, 'index'])->name('about');
// Route::resource('/filesearch', FilePage::class);
Route::get('/filesearch', [FilePage::class, 'index'])->name('filesearch');
Route::get('/detailfile/{id}', [FilePage::class, 'detail'])->name('detailfile');

//route download file
Route::get('/download/{id}', function ($id) {
    $file = File::findOrFail($id);

    // Cek apakah file ada di storage
    if (Storage::disk('public')->exists($file->file_path)) {
        return Storage::disk('public')->download($file->file_path, $file->nama_asli);
    } else {
        abort(404, 'File not found.');
    }
});

// halaman detail foto
Route::get('/foto/{id}', [DetailFotoController::class, 'show'])->name('detailfoto');
Route::get('/vidio/{id}', [DetailVidioController::class, 'show'])->name('detailvidio');

// halaman kategori foto
Route::get('/kategori/{nama_kategori}', [App\Http\Controllers\KategoriController::class, 'filterByCategory'])->name('kategori.filter');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // batas
    Route::patch('/profile/update', [ProfileController::class, 'updatephoto'])->name('profile.update.photo');
    Route::delete('/profile/update', [ProfileController::class, 'destroyphoto'])->name('profile.destroy.photo');
});

// auth Google
Route::get('/auth/google', [GoogleAuthController::class, 'googleauth']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'googlecallback']);

// bagian admin
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('/tambahkategori', TambahKategori::class);
    Route::resource('/editkontak', EditKontakController::class);
    Route::resource('/editabout', EditAboutController::class);

    // manage
    Route::resource('/muser', TampilUserController::class);
    Route::resource('/mfile', TampilFileController::class);
    Route::resource('/mfoto', TampilFotoController::class);
    Route::resource('mvidio', TampilVidioController::class);
});

// bagian pengguna
Route::middleware(['auth', 'verified', 'role:pengguna'])->group(function () {
    Route::get('pengguna', [DashboardUserController::class, 'index'])->name('pengguna.index');
    Route::resource('tambahfoto', TambahFotoController::class);
    Route::resource('tambahvidio', TambahVidioController::class);
    Route::resource('tambahfile', FileController::class);
    Route::patch('/vidio/{vidio}', [TambahVidioController::class, 'update'])->name('updatevidio');
    Route::patch('/file/{file}', [FileController::class, 'update'])->name('updatefile');
});


require __DIR__ . '/auth.php';
