<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import model User jika belum ada

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
                return redirect()->intended('/admin'); // Menggunakan path admin dari main
            } elseif ($user->role === 'mitra' || $user->role === 'dokter') {
                return redirect()->intended(route('mitra.welcome'));
            } elseif ($user->role === 'pasien') {
                return redirect()->intended(route('riwayat'));
            }

            // Default fallback jika role tidak dikenali, mirip dengan logic miexed2
            return redirect()->intended('/riwayat');
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Menambahkan method logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        // Instead of invalidating the entire session, just remove the web guard session key
        $request->session()->forget('login_web_'.md5(config('app.key')));

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
