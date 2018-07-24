<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/22 0022
 * Time: 19:01
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BescController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',
//            黑名单
           ["except"=>"login"]
//            白名单
//            ["only"=>"login",]
        );
        $this->middleware("guest",[
            "only"=>["login"]
        ]);
    }
}