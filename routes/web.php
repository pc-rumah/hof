<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DetailFotoController;
use App\Http\Controllers\DetailVidioController;
use App\Http\Controllers\EditAboutController;
use App\Http\Controllers\EditKontakController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TambahFotoController;
use App\Http\Controllers\TambahVidioController;
use App\Models\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// halaman landing page
Route::get('/', [LandingPageController::class, 'index'])->name('welcome');
// Route::get('/kontak', function () {
//     return view('konten.kontak');
// });

ROute::get('/kontak', [KontakController::class, 'index'])->name('kontak');

Route::get('/about', [AboutController::class, 'index'])->name('about');


// halaman detail foto
Route::get('/foto/{id}', [DetailFotoController::class, 'show'])->name('detailfoto');
Route::get('/vidio/{id}', [DetailVidioController::class, 'show'])->name('detailvidio');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // batas
    Route::patch('/profile/update', [ProfileController::class, 'updatephoto'])->name('profile.update.photo');
    Route::delete('/profile/update', [ProfileController::class, 'destroyphoto'])->name('profile.destroy.photo');
});

// Route::get('admin', function () {
//     return '<h1>LOgin admin</h1>';
// })->middleware(['auth', 'verified', 'role:admin']);
// Route::get('pengguna', function () {
//     return '<h1>LOgin pengguna</h1>';
// })->middleware(['auth', 'verified', 'role:pengguna']);
// Route::get('kelola', function () {
//     return '<h1>LOgin kelola</h1>';
// })->middleware(['auth', 'verified', 'role_or_permission:tambah-file|admin']);



// bagian admin
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/editkontak', EditKontakController::class);
    Route::resource('/editabout', EditAboutController::class);
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
