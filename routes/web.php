<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Halaman utama
Route::view('/', 'landing.home')->name('home');
Route::view('/tentang', 'landing.about')->name('tentang');
Route::view('/reservasi', 'landing.reservasi')->name('reservasi');

// Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


