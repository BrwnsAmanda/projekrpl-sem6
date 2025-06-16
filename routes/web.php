<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Pastikan Auth diimpor jika digunakan dalam rute langsung
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RujukanController; // Diimpor dari main
use App\Http\Controllers\RiwayatController; // Diimpor dari main
use App\Http\Controllers\Auth\ProfileController; // Corrected import path

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

// Halaman utama
Route::view('/', 'landing.home')->name('home');
Route::view('/tentang', 'landing.about')->name('tentang');

// Rute Reservasi
Route::get('/reservasi', function () { // Menggunakan route get untuk menampilkan form
    return view('landing.reservasi');
})->name('reservasi');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store'); // Menggunakan post untuk submit form

// Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Login Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {

    // Rute Riwayat (Dari main)
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

    // Rute Profil (Dari miexed2/main digabung)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Jika ada route delete profil

    // Rute Logout (Menggunakan controller dari LoginController yang sudah diperbaiki konflik)
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Rujukan (Untuk Mitra/Dokter) - Menggunakan struktur dari main dengan perbaikan
    Route::prefix('/mitra')->group(function(){
        Route::view('/', 'mitra.welcome')->name('mitra.welcome'); // Named route dari main
        Route::view('/rujukan', 'mitra.reservasimitra')->name('mitra.rujukan'); // Named route dari main

        // === Rute BARU untuk Riwayat Rujukan Mitra ===
        Route::get('/rujukan/riwayat', [RujukanController::class, 'riwayatRujukan'])->name('mitra.rujukan.riwayat');
        // ============================================

        // Rute untuk Rujukan/Reservasi Mitra (Dari main, diaktifkan)
        // Sesuaikan jika show/store perlu middleware tambahan
        Route::get('/rujukan/{id}', [RujukanController::class, 'show'])->name('mitra.rujukan.show');
        Route::post('/rujukan/create', [RujukanController::class, 'store'])->name('mitra.rujukan.store');
    });

    // Tambahkan rute admin di sini jika ada dan perlu middleware 'auth' atau 'admin'
    // Route::prefix('/admin')->middleware('can:viewAdminPanel')->group(function () {
    //     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //     // ... rute admin lainnya
    // });

});

// Jika ada rute lain yang tidak memerlukan autentikasi bisa diletakkan di luar group middleware('auth')
