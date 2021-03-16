<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'petugas';
    protected $fillable = ['nama_petugas', 'username', 'password', 'telp', 'level'];
    
    protected $guard = 'admin';
    protected $hidden = ['password'];
}
