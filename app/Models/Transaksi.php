<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaksi';

    // Relasi: Satu transaksi untuk satu tagihan
    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'id_tagihan', 'id_tagihan');
    }

    // Relasi: Satu transaksi diverifikasi oleh satu bendahara (user)
    public function bendahara()
    {
        return $this->belongsTo(User::class, 'id_bendahara', 'id');
    }
}