<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

   const ADMIN = 'ADMIN';
   const EMPLOYEE = 'EMPLOYEE';
   const HEADMASTER = 'HEADMASTER';

   public $incrementing = false;

    protected $fillable = [
        'id',
        'userable_id',
        'nama',
        'username',
        'password',
        'role',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
