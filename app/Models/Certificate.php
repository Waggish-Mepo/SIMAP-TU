<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $incrementing = false;

    // Jenis
    const WEBINAR = 'Webinar';
    const PENGHARGAAN = 'Penghargaan';
    const PELATIHAN = 'Pelatihan';
    const SEMINAR = 'Seminar';
    const WORKSHOP = 'Workshop';

    // Tingkatan
    const KOTA = 'Kota';
    const PROVINSI = 'Provinsi';
    const NASIONAL = 'Nasional';
    const INTERNASIONAL = 'Internasional';
    const LAINNYA = 'Lainnya';
}
