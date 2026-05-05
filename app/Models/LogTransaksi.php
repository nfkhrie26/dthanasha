<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTransaksi extends Model
{
    use HasFactory;

    protected $table = 'log_transaksi'; //[cite: 6]

    // Mematikan incrementing karena primary key-nya string (order_id)
    public $incrementing = false;
    protected $keyType = 'string'; //[cite: 6]

    protected $fillable = [
        'order_id',
        'id_tagihan',
        'id_waiting_list',
        'snap_token',
        'tipe_pembayaran',
        'status_transaksi'
    ]; //[cite: 6]

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'id_tagihan');
    }
}