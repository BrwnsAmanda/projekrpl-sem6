<?php

namespace App\Http\Controllers;

use App\Models\Reservasi; // Diperlukan untuk relasi di model Riwayat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Diperlukan untuk mendapatkan user ID
use App\Models\Riwayat; // Diperlukan model Riwayat

class RiwayatController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Mendapatkan ID user yang sedang login

        // Mengambil semua data riwayat yang punya reservasi milik user login
        // Menggunakan pendekatan dari 'main' karena query Riwayat yang berelasi dengan Reservasi user
        $riwayats = Riwayat::with('reservasi') // Eager load relasi reservasi
            ->whereHas('reservasi', function ($q) use ($userId) {
                // Filter Riwayat yang reservasi_id-nya berelasi dengan Reservasi milik user ini
                $q->where('user_id', $userId);
            })
            // Melakukan join ke tabel reservasis untuk bisa mengurutkan berdasarkan jadwal_pemeriksaan
            ->join('reservasis', 'riwayats.reservasi_id', '=', 'reservasis.id')
            // Mengurutkan berdasarkan jadwal pemeriksaan terbaru lebih dulu (dari main)
            ->orderByDesc('reservasis.jadwal_pemeriksaan')
            // Memilih kolom dari tabel riwayats saja untuk menghindari konflik nama kolom
            ->select('riwayats.*')
            ->get();

        // Menambahkan variabel hasData seperti di miexed2 jika view memerlukannya
        $hasData = $riwayats->isNotEmpty();

        // Mengirim data ke view (Menggunakan compact seperti di main, dan nama view dari kedua branch)
        return view('landing.riwayat', compact('riwayats', 'hasData'));
    }
}