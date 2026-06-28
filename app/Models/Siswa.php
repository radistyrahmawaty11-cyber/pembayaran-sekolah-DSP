<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nisn';
    public $incrementing = false; // Karena primary key bukan angka

    // Relasi: Satu siswa memiliki satu kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    // Relasi: Satu siswa memiliki banyak tagihan
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'nisn', 'nisn');
    }

    // Relasi: Satu siswa memiliki satu user
    public function user()
    {
        return $this->hasOne(User::class, 'id_siswa', 'nisn');
    }
}