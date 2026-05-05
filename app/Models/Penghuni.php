<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    // Kasih tau nama tabelnya biar Laravel gak nyari tabel 'penghunis'
    protected $table = 'penghuni';

    // Kolom yang boleh diisi (sesuai file migration temen lu)
    protected $fillable = [
        'id_user',
        'id_kamar',
        'nama_penghuni',
        'usia',
        'jenis_kelamin',
        'no_telepon',
        'no_telepon_orangtua',
    ];

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}