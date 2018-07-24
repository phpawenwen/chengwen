<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu_categories extends Model
{
    //设置可编辑字段
    public $fillable=['menu_name','type_accumulation','user_id','description','is_selected'];

}
