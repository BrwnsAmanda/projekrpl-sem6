<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
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
        'jenis_kelamin',
        'alamat',
        'harga',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function riwayats()
    {
        return $this->hasMany(Riwayat::class, 'reservasi_id');
    }

    public function getHargaAttribute()
    {
        return \App\Models\PemeriksaanHarga::getHarga($this->jenis_pemeriksaan, $this->detail_pemeriksaan) ?? 0;
    }

    // Reservasi.php
protected static function booted()
{
    static::deleting(function ($reservasi) {
        $reservasi->riwayats()->delete();
    });
}

}
