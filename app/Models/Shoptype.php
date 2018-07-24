<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shoptype extends Model
{
    public $fillable=['name','logo'];

//    public function goods(){
//
//        return $this->belongsTo(Goods::class);
//    }
}
