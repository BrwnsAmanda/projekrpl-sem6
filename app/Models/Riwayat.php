<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Riwayat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'reservasi_id',
        'harga',
        'invoice_number',
        'hasil_pemeriksaan',
        'status_pembayaran',
    ];

    public function reservasi()
{
    return $this->belongsTo(Reservasi::class, 'reservasi_id');
}

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
