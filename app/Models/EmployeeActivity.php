<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeActivity extends Model
{
    use HasFactory;

    // // kategori
    // const WEBINAR = 'WEBINAR';
    // const WORKSHOP = 'WORKSHOP';
    // const SEMINAR = 'SEMINAR';

    protected $table = 'employee_activity';
    protected $incrementing = false;

    protected $fillable = [
        'id',
        'employee_id',
        'nama_kegiatan',
        'tgl_kegiatan',
        'kategori',
    ];
}