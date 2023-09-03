<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'nama',
        'tunggakan',
        'tagihan',
        'proses_pembayaran',
        'bukti_transfer',
        'bupot',
        'lunas'
    ];
}
