<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijazah extends Model
{
    use HasFactory;


    // Keahlian
    // const Rekayasa_Perangkat_Lunak = 'RPL';
    // const Teknik_Komputer_jaringan = 'TKJ';
    // const Multi_Media = 'MMD';
    // const Tata_Boga = 'TBG';
    // const Perkantoran = 'OTKP';
    // const Bisnis_Pemasaran = 'BDP';
    // const Hotel = 'HTL';

    protected $table = 'ijazah';

    protected $incrementing = false;

    protected $fillable = [
        'id',
        'employee_id',
        'keahlian',
        'nama_sekolah',
        'npsn',
        'kabupaten',
        'provinsi',
        'nama_ortu',
        'nis',
        'nisn',
        'no_peserta_un',
    ];
}