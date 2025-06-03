<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanHarga extends Model
{
    protected $fillable = [
        'jenis_pemeriksaan',
        'detail_pemeriksaan',
        'harga'
    ];

    // Helper method untuk mendapatkan harga berdasarkan jenis dan detail
    public static function getHarga($jenis, $detail)
    {
        return static::where('jenis_pemeriksaan', $jenis)
            ->where('detail_pemeriksaan', $detail)
            ->value('harga');
    }
} 