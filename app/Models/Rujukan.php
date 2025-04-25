<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rujukan extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'nik',
        'jenis_kelamin',
        'jadwal_pemeriksaan',
        'jenis_pemeriksaan',
        'no_telepon',
        'catatan_dokter',
        'file_rujukan',
    ];
}
