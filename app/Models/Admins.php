<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{

    public $fillable=['name','password','email'];
}
