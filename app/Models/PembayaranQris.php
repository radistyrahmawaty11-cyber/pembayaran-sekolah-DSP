<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranQris extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembayaran';

    // Relasi: Satu pembayaran QRIS untuk satu tagihan
    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'id_tagihan', 'id_tagihan');
    }
}