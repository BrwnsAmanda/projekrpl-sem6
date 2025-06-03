<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $riwayats = Reservasi::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('landing.riwayat', [
            'riwayats' => $riwayats,
            'hasData' => $riwayats->isNotEmpty()
        ]);
    }
} 