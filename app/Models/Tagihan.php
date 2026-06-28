<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tagihan';

    // Relasi: Satu tagihan milik satu siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    // Relasi: Satu tagihan punya satu jenis pembayaran
    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class, 'id_jenis', 'id_jenis');
    }

    // Relasi: Satu tagihan bisa punya satu pembayaran QRIS
    public function pembayaranQris()
    {
        return $this->hasOne(PembayaranQris::class, 'id_tagihan', 'id_tagihan');
    }

    // Relasi: Satu tagihan bisa punya banyak transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_tagihan', 'id_tagihan');
    }
}