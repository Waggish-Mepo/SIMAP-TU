<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    use HasFactory;

    protected $table = 'meetings';

    protected $incrementing = false;

    protected $fillable = [
        'id',
        'notula_id',
        'pimpinan_rapat',
        'materi',
        'daftar_hadir',
        'tanggal',
        'waktu',
        'tempat',
        'status',
        'dokumentasi'
    ];
}