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
        'punya_rujukan',
        'surat_rujukan_path',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function riwayats()
    {
        return $this->hasMany(Riwayat::class, 'reservasi_id');
    }
}
