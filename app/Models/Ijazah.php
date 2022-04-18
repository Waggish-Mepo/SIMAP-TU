<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijazah extends Model
{
    use HasFactory;

    protected $table = 'ijazah';

    protected $fillable = [
        'id',
        'employee_id',
        'nomor',
        'jurusan',
        'nama_sekolah',
        'npsn',
        'kabupaten_kota',
        'provinsi',
        'nama_ortu',
        'nis',
        'nisn',
        'no_peserta_un',
        'ijazah',
    ];
}
