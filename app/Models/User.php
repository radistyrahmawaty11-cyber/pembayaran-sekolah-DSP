<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Beritahu Laravel bahwa primary key kita bernama 'id_user'
    protected $primaryKey = 'id_user';

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'username',
        'password',
        'role',
        'id_siswa',
    ];

    // Kolom yang harus disembunyikan saat data diubah jadi array/JSON (keamanan)
    protected $hidden = [
        'password',
    ];

    // Casting tipe data
    protected $casts = [
        'password' => 'hashed',
    ];
}