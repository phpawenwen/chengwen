<?php

namespace App\Models;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $fillable=['name','password','email','shop_id'];

    public function shopcontent(){

        return $this->belongsTo(shopcontent::class,'shop_id');
    }
}
