<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RujukanController extends Controller
{
    public function show($id){
        $rujukan = Rujukan::find($id);

        return response()->json([
            'success' => true,
            'data' => $penerima
        ], 201);
    }

    public function store(Request $request){
      $validator = Validator::make($request->all(), [
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'nik' => 'required|string',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'jadwal_pemeriksaan' => 'required|date_format:Y-m-d\TH:i',
        'jenis_pemeriksaan' => 'required|string',
        'no_telepon' => 'required|string',
        'catatan_dokter' => 'nullable|string',
        'file_rujukan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
      ]);

      if ($validator->fails()){
        return response()->json(['error' => $validator->errors()], 422);
    }

    $validated = $validator->validated();

    if ($request->hasFile('file_rujukan')) {
        $validated['file_rujukan'] = $request->file('file_rujukan')->store('rujukan_files', 'public');
    }

    Rujukan::create($validated);

    return response()->json(['message' => 'Data rujukan berhasil disimpan.'], 201);
    }
}
