<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
    use HasFactory;

    protected $table = 'waiting_list'; 

    protected $fillable = [
        'nama', 
        'jenis_kelamin', 
        'no_telepon', 
        'preferensi_kamar'
    ];
}