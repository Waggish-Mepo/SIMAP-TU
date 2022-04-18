<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitLetter extends Model
{
    use HasFactory;

    public $incrementing = false;

    //Status
    const BELUM_SELESAI = 'Belum Selesai';
    const SELESAI = 'Selesai';

    //Hari
    const SENIN = 'SENIN';
    const SELASA = 'SELASA';
    const RABU = 'RABU';
    const KAMIS = 'KAMIS';
    const JUMAT = 'JUMAT';


    protected $casts = [
        'tanggal' => 'datetime:d-m-Y'
    ];

    protected $fillable = [
        'lampiran',
        'dokumentasi',
    ];
}
