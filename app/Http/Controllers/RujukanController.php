<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rujukan;
use Illuminate\Support\Facades\Auth;

class RujukanController extends Controller
{
    public function show($id){
        $rujukan = Rujukan::find($id);

        return response()->json([
            'success' => true,
            'data' => $rujukan
        ], 201);
    }

    public function store(Request $request){
      $validator = Validator::make($request->all(), [
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'nik' => 'required|string',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'jadwal_pemeriksaan' => 'required|after_or_equal:today',
        'jenis_pemeriksaan' => 'required|string',
        'detail_pemeriksaan' => 'required|string',
        'no_telepon' => 'required|string',
        'catatan_dokter' => 'nullable|string',
        'file_rujukan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
      ]);

      if ($validator->fails()){
        return response()->json(['error' => $validator->errors()], 422);
    }

    $validated = $validator->validated();

    $filepath = null;
    if ($request->hasFile('file_rujukan')) {
        $filepath = $request->file('file_rujukan')->store('rujukan', 's3');
    }

    $validated['user_id'] = auth()->check() ? auth()->id() : null;

    Rujukan::create($validated);

    return back()->with('success', 'Rujukan berhasil dibuat.');
    }

    /**
     * Display a listing of the user's referrals.
     *
     * @return \Illuminate\View\View
     */
    public function riwayatRujukan()
    {
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Mengambil data rujukan yang diajukan oleh user ini.
        // ASUMSI: Ada model App\Models\Rujukan dan kolom 'user_id' pada tabel rujukans.
        // Anda mungkin perlu menyesuaikan query ini berdasarkan struktur database Anda.
        $rujukans = \App\Models\Rujukan::where('user_id', $user->id)->get();

        // Mengirim data rujukan ke view riwayat_rujukan.blade.php
        return view('mitra.riwayat_rujukan', compact('rujukans'));
    }
}
