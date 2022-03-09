<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $table = 'meetings';

    public $incrementing = false;

    const SELESAI = 'Selesai';
    const PROSESS = 'Prosess';
    const BELUM_MULAI = 'Belum mulai';
}