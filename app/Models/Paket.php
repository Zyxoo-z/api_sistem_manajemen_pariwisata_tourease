<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'destinasi_id',
        'nama_paket',
        'durasi',
        'harga',
        'deskripsi'
    ];

    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}