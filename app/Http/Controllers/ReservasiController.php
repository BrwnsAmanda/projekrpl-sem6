<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\PemeriksaanHarga;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
            'rujukan' => 'required|in:Ya,Tidak',
            'surat_rujukan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'hasil_pemeriksaan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Hitung harga pemeriksaan
        $harga = PemeriksaanHarga::getHarga($validated['jenis_pemeriksaan'], $validated['detail_pemeriksaan']);

        // Handle file upload surat_rujukan
        $filePathRujukan = null;
        if ($request->hasFile('surat_rujukan')) {
            $filePathRujukan = $request->file('surat_rujukan')->store('rujukan', 's3');
            Log::info('Upload surat_rujukan success: ' . $filePathRujukan);
        } else {
            Log::warning('No surat_rujukan file uploaded.');
        }

        // Handle file upload hasil_pemeriksaan
        $filePathHasil = null;
        if ($request->hasFile('hasil_pemeriksaan')) {
            $filePathHasil = $request->file('hasil_pemeriksaan')->store('hasil_pemeriksaan', 's3');
            Log::info('Upload hasil_pemeriksaan success: ' . $filePathHasil);
        } else {
            Log::warning('No hasil_pemeriksaan file uploaded.');
        }

        // Buat reservasi
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
            'rujukan' => $validated['rujukan'],
            'surat_rujukan' => $filePathRujukan,
            'user_id' => Auth::check() ? Auth::id() : null,
            'harga' => $harga ?? 0,
            'status' => 'Menunggu Pembayaran'
        ]);

        // Buat riwayat setelah reservasi dibuat
        Riwayat::create([
            'reservasi_id' => $reservasi->id,
            'harga' => $harga ?? 0,
            'status' => 'Belum Dibayar',
            'invoice_number' => 'INV-' . strtoupper(uniqid()),
            'hasil_pemeriksaan' => $filePathHasil,
        ]);

        return redirect()->route('reservasi')->with('success', 'Reservasi berhasil dibuat.');
    }

    public function index()
    {
        $reservasis = auth()->user()->reservasis()->latest()->get();
        return view('reservasi.index', compact('reservasis'));
    }
}
