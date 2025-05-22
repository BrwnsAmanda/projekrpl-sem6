<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\RiwayatController;
use App\Models\Riwayat;

class ReservasiController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string',
        'nik' => 'required|digits:16',
        'telepon' => 'required|string|max:15',
        'tanggal_lahir' => 'required|date',
        'jadwal_pemeriksaan' => 'required|date|after_or_equal:today',
        'jenis_pemeriksaan' => 'required|string',
        'detail_pemeriksaan' => 'required|string',
        'punya_rujukan' => 'required|in:Ya,Tidak',
        'surat_rujukan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
    ]);

    $filePath = null;
    if ($request->hasFile('surat_rujukan')) {
        $filePath = $request->file('surat_rujukan')->store('rujukan', 'public');
    }

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
        'user_id' => auth()->check() ? auth()->id() : null,
        'status' => 'Menunggu',
    ]);

    // Buat riwayat setelah reservasi dibuat
    Riwayat::create([
        'reservasi_id' => $reservasi->id,
        'harga' => 0, // sesuaikan jika ada harga
        'status_pembayaran' => 'Belum Dibayar',
        'invoice_number' => 'INV-' . strtoupper(uniqid()),
        'hasil_pemeriksaan' => null,
    ]);

    return back()->with('success', 'Reservasi berhasil dibuat.');
}

    public function index()
    {
        $reservasis = auth()->user()->reservasis()->latest()->get();
        return view('reservasi.index', compact('reservasis'));
    }
}
