<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nisn';
    public $incrementing = false;
    
    // TAMBAHKAN BARIS INI 👇
    protected $table = 'siswa';

    // Relasi
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'nisn', 'nisn');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_siswa', 'nisn');
    }
}