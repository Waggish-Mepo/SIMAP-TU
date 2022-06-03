<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    public $incrementing = false;

    // jenis surat
    const SuratMasuk = 'Surat Masuk';
    const SuratKeluar = 'Surat Keluar';

    // sifat surat
    const Rahasia = 'Rahasia';
    const Penting = 'Penting';
    const Segera = 'Segera';
    const Biasa = 'Biasa';

    protected $casts = [
        'tgl_surat' => 'datetime:d/m/Y',
        'tgl_terima' => 'datetime:d/m/Y',
    ];

    protected $fillable = [
        'file',
    ];
}
