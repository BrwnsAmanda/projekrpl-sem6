<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

       if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Cek berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif ($user->role === 'mitra') {
            return redirect()->intended(route('mitra.welcome'));
        } elseif ($user->role === 'pasien') {
            return redirect()->intended(route('riwayat')); // default untuk pasien/user biasa
        }
    }
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}
