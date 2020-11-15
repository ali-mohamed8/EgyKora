<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{


    protected $table='admins';

    protected $fillable = [
        'name', 'password','image'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false ;


}
