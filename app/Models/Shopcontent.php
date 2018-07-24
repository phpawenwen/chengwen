<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shopcontent extends Model
{
    //
    public $fillable=['name','logo','dizhi','pinpai','bao','piao','zhun','content','youhuixinxi','status','peisongfangshi','start_send','shoptype_id'];

    public function shoptype(){
//
        return $this->belongsTo(shoptype::class);
    }
}
