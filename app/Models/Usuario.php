<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Usuario extends Authenticatable
{
    protected $fillable = ['nome', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
