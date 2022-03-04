<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterOut extends Model
{
    use HasFactory;

    // sifat surat
    const Rahasia = 'Rahasia';
    const Penting = 'Penting';
    const Segera = 'Segera';
    const Biasa = 'Biasa';

    public $incrementing = false;
    protected $casts = [
        'tgl_surat' => 'datetime:d-m-Y',
    ];
}