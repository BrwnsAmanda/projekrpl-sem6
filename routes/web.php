<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RujukanController;
use App\Http\Controllers\RiwayatController;

// Halaman utama
Route::view('/', 'landing.home')->name('home');
Route::view('/tentang', 'landing.about')->name('tentang');
Route::view('/reservasi', 'landing.reservasi')->name('reservasi');

// Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// Login Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Rujukan
Route::prefix('/mitra')->group(function(){
    Route::view('/', 'mitra.welcome')->name('mitra.welcome');
    Route::view('/rujukan', 'mitra.reservasimitra')->name('mitra.rujukan');
    Route::get('/{id}', [RujukanController::class, 'show']);
    Route::post('/create', [RujukanController::class, 'store'])->name('rujukan.store');
});

//Reservasi
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');


Route::get('/riwayat', [RiwayatController::class, 'index'])
    ->middleware('auth')
    ->name('riwayat');
//Route::get('/riwayat-preview', [RiwayatController::class, 'index']);

