<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'alamat',
        'nik',
        'telepon',
        'tanggal_lahir',
        'jadwal_pemeriksaan',
        'jenis_pemeriksaan',
        'detail_pemeriksaan',
        'rujukan',
        'surat_rujukan',
        'user_id',
        'hasil_pemeriksaan',
        'harga',
        'status'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'jadwal_pemeriksaan' => 'date',
        'harga' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 