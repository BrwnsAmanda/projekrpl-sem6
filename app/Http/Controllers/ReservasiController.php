<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\PemeriksaanHarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservasiController extends Controller
{
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'nik' => 'required|numeric',
            'telepon' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jadwal_pemeriksaan' => 'required|date',
            'jenis' => 'required|string',
            'detail' => 'required|string',
            'rujukan' => 'required|string',
            'surat_rujukan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        $harga = PemeriksaanHarga::getHarga($validated['jenis'], $validated['detail']);

        if ($request->hasFile('surat_rujukan')) {
            $validated['surat_rujukan'] = $request->file('surat_rujukan')->store('rujukan');
            
        }

        $validated['jenis_pemeriksaan'] = $validated['jenis'];
        $validated['detail_pemeriksaan'] = $validated['detail'];
        $validated['user_id'] = Auth::check() ? Auth::id() : null;
        $validated['harga'] = $harga ?? 0; // Set harga, default 0 jika tidak ditemukan
        $validated['status'] = 'Menunggu Pembayaran'; 

        Reservasi::create($validated);
        

        return redirect()->route('reservasi')->with('success', 'Reservasi berhasil dikirim.');
    }
}
