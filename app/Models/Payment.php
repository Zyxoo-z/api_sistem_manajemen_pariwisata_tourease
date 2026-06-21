<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'metode_pembayaran',
        'jumlah_bayar',
        'tanggal_bayar',
        'status_pembayaran'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}