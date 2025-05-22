<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rujukan;

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
        'tanggal_pemeriksaan' => 'required|after_or_equal:today',
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

    if ($request->hasFile('file_rujukan')) {
        $validated['file_rujukan'] = $request->file('file_rujukan')->store('rujukan_files', 'public');
    }

    $validated['user_id'] = auth()->check() ? auth()->id() : null;

    Rujukan::create($validated);

    return back()->with('success', 'Rujukan berhasil dibuat.');
    }
}
