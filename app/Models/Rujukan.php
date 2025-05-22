<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rujukan extends Model
{

    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'nik',
        'jenis_kelamin',
        'tanggal_pemeriksaan',
        'jenis_pemeriksaan',
        'detail_pemeriksaan',
        'no_telepon',
        'catatan_dokter',
        'file_rujukan',
        'user_id'
    ];
}
