<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitLetter extends Model
{
    use HasFactory;

    public $incrementing = false;

    const ARSIP = 'arsip';

    protected $casts = [
        'tanggal' => 'datetime:d-m-Y'
    ];

    protected $fillable = [
        'lampiran',
        'dokumentasi',
    ];
}
