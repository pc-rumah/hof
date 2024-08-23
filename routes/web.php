<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TambahFotoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('admin', function () {
//     return '<h1>LOgin admin</h1>';
// })->middleware(['auth', 'verified', 'role:admin']);

// Route::get('pengguna', function () {
//     return '<h1>LOgin pengguna</h1>';
// })->middleware(['auth', 'verified', 'role:pengguna']);


Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
});

Route::middleware(['auth', 'verified', 'role:pengguna'])->group(function () {
    Route::get('pengguna', [DashboardUserController::class, 'index'])->name('pengguna.index');
    Route::resource('tambahfoto', TambahFotoController::class);
});
// Route::get('kelola', function () {
//     return '<h1>LOgin kelola</h1>';
// })->middleware(['auth', 'verified', 'role_or_permission:tambah-file|admin']);

require __DIR__ . '/auth.php';
