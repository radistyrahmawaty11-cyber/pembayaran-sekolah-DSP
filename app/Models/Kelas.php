<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kelas';
    
    protected $table = 'kelas';

    // TAMBAHKAN BARIS INI 👇
    protected $fillable = [
        'nama_kelas',
        'jurusan',
        'tahun_angkatan',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
    }
}