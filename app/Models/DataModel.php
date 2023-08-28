<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'Partner',
        'Idnumber',
        'BPName',
        'Account Name',
        'Subsegmen',
        'Business Share',
        'Divisi',
        'Witel',
        'Cicilan',
        'Bill Curr',
        'Saldo Akhir N-1',
        'Tagihan N',
        'Total Tagihan',
        'Total CL',
        'Saldo Akhir',
        '0-3 Bulan',
        '4-6 Bulan',
        '7-12 Bulan',
        '13-24 Bulan',
        '> 24 Bulan',
        'L11 Saldo',
        'STATUS 1',
        'UPDATE TUNGGAKAN',
        'TGL UPDATE',
        'STATUS 2',
        'SEGMEN 2',
        'AM UPDATE',
        'NAMA PELANGGAN',
        'STO',
        'HERO',
        'DATEL',
    ];
}
