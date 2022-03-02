<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaMeeting extends Model
{
    use HasFactory;

    protected $table = 'agenda_meetings';
    protected $incrementing = false;
}