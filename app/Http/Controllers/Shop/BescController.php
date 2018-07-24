<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/22 0022
 * Time: 19:01
 */

namespace App\Http\Controllers\Shop;


use App\Http\Controllers\Controller;

class BescController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth',
//            除开他们其他都不能看
            ["except"=>["login","reg"]]
//            未登录之前只有他不能使用
//            ["only"=>"login",]
        );
//        游客模式
//        $this->middleware("guest",[
////             游客只有他不能使用
//            "only"=>["login"]
//        ]);
    }
}