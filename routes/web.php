<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;

// Halaman utama
Route::view('/', 'landing.home')->name('home');
Route::view('/tentang', 'landing.about')->name('tentang');
Route::view('/reservasi', 'landing.reservasi')->name('reservasi');

// Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Login Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Rujukan
Route::prefix('/mitra')->group(function(){
    Route::view('/', 'mitra.welcome');
    Route::view('/rujukan', 'mitra.reservasimitra');
    Route::get('/{id}', [RujukanController::class, 'show']);
    Route::post('/create', [RujukanController::class, 'store'])->name('rujukan.store');
});

Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])
    ->middleware('auth')
    ->name('riwayat');
//Route::get('/riwayat-preview', [RiwayatController::class, 'index']);

