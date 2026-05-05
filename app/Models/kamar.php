<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar'; 
    
    protected $fillable = [
        'nomor_kamar', 
        'harga_kamar', 
        'jenis_kamar', 
        'status_kamar'
    ];
}