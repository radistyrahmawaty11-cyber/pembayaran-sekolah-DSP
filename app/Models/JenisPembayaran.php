<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jenis';
    
    protected $table = 'jenis_pembayaran';

    // Relasi: Satu jenis pembayaran bisa ada di banyak tagihan
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id_jenis', 'id_jenis');
    }
}