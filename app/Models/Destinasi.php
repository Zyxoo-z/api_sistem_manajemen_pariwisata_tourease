<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $fillable = [
        'nama_destinasi',
        'lokasi',
        'deskripsi',
        'harga_tiket'
    ];

    public function pakets()
    {
        return $this->hasMany(Paket::class);
    }
}