<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notula extends Model
{
    use HasFactory;

    protected $table = 'notulas';
    public $incrementing = false;
}