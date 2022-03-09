<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeActivity extends Model
{
    use HasFactory;

    // // kategori
    const WEBINAR = 'Webinar';
    const WORKSHOP = 'Workshop';
    const SEMINAR = 'Seminar';
    const EVENT = 'Event';
    const LAINNYA = 'Lainnya';

    protected $table = 'employee_activities';
    public $incrementing = false;

    protected $fillable = [
        'nama_kegiatan',
        'tgl_kegiatan',
        'kategori',
    ];
}