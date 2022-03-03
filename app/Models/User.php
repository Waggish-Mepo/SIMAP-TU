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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function employee() {
        return $this->hasOne(Employee::class, 'id', 'userable_id');
    }

}
