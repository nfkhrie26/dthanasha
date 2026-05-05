<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan'; //[cite: 7]

    protected $fillable = [
        'id_penghuni',
        'periode_bulan',
        'status_tagihan',
        'nominal_tagihan',
        'tanggal_bayar',
        'jatuh_tempo',
        'bukti_transfer'
    ]; //[cite: 7]

    // Relasi ke Penghuni
    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class, 'id_penghuni');
    }

    // Relasi ke Log Transaksi
    public function logTransaksi()
    {
        return $this->hasMany(LogTransaksi::class, 'id_tagihan');
    }
}