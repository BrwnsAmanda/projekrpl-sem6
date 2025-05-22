<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function index()
    {

        $userId = Auth::user()->id;

        // Ambil semua data riwayat yang punya reservasi milik user login
       $riwayats = Riwayat::with('reservasi')
    ->whereHas('reservasi', function ($q) use ($userId) {
        $q->where('user_id', $userId);
    })
    ->join('reservasis', 'riwayats.reservasi_id', '=', 'reservasis.id')
    ->orderByDesc('reservasis.jadwal_pemeriksaan')
    ->select('riwayats.*') // penting agar tidak mengganggu struktur Eloquent
    ->get();




        return view('landing.riwayat', compact('riwayats'));
    }
}
