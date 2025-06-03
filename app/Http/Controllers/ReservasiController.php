<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\PemeriksaanHarga; // Diimpor dari miexed2
use App\Models\Riwayat; // Diimpor dari main
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Diimpor dari miexed2
use Illuminate\Support\Facades\Storage; // Diimpor dari main

class ReservasiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255', // Dari main
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan', // Dari main
            'alamat' => 'required|string', // Dari kedua branch
            'nik' => 'required|digits:16', // Dari main
            'telepon' => 'required|string|max:15', // Dari main
            'tanggal_lahir' => 'required|date', // Dari kedua branch
            'jadwal_pemeriksaan' => 'required|date|after_or_equal:today', // Dari main
            'jenis_pemeriksaan' => 'required|string', // Menggunakan nama field dari main
            'detail_pemeriksaan' => 'required|string', // Menggunakan nama field dari main
            'punya_rujukan' => 'required|in:Ya,Tidak', // Dari main
            'surat_rujukan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048' // Dari kedua branch
        ]);

        // Hitung harga pemeriksaan (Dari miexed2)
        $harga = PemeriksaanHarga::getHarga($validated['jenis_pemeriksaan'], $validated['detail_pemeriksaan']);

        // Handle file upload (Menggunakan storage public dari main)
        $filePath = null;
        if ($request->hasFile('surat_rujukan')) {
            $filePath = $request->file('surat_rujukan')->store('rujukan', 'public');
        }

        // Buat reservasi (Menggabungkan field dari kedua branch)
        $reservasi = Reservasi::create([
            'nama' => $validated['nama'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
            'nik' => $validated['nik'],
            'telepon' => $validated['telepon'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jadwal_pemeriksaan' => $validated['jadwal_pemeriksaan'],
            'jenis_pemeriksaan' => $validated['jenis_pemeriksaan'],
            'detail_pemeriksaan' => $validated['detail_pemeriksaan'],
            'punya_rujukan' => $validated['punya_rujukan'],
            'surat_rujukan_path' => $filePath,
            'user_id' => Auth::check() ? Auth::id() : null, // Dari miexed2
            'harga' => $harga ?? 0, // Menggunakan harga dari perhitungan miexed2
            'status' => 'Menunggu Pembayaran' // Dari miexed2
        ]);

        // Buat riwayat setelah reservasi dibuat (Dari main)
        Riwayat::create([
            'reservasi_id' => $reservasi->id,
            'harga' => $harga ?? 0, // Menggunakan harga yang dihitung
            'status_pembayaran' => 'Belum Dibayar', // Dari main
            'invoice_number' => 'INV-' . strtoupper(uniqid()), // Dari main
            'hasil_pemeriksaan' => null, // Dari main
        ]);

        // Redirect setelah berhasil (Menggunakan redirect route dari miexed2 dan pesan dari main)
        return redirect()->route('reservasi')->with('success', 'Reservasi berhasil dibuat.');
    }

    // Method index dari main
    public function index()
    {
        $reservasis = auth()->user()->reservasis()->latest()->get();
        return view('reservasi.index', compact('reservasis'));
    }
}