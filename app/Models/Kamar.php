<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    // Paksa Laravel buat baca tabel bernama 'kamar' (bukan 'kamars')
    protected $table = 'kamar';

    // Daftarin kolom apa aja yang boleh diisi (mass assignment)
    protected $fillable = [
        'nomor_kamar',
        'status_kamar',
        'jenis_kamar',
        'jenis_kelamin',
        'nama_penghuni',
    ];
}