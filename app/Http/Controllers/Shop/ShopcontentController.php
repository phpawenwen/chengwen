<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shopcontent;
use App\Models\Shoptype;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Shop\BescController as ShopBascController;

class ShopcontentController extends ShopBascController
{
    /*
     * 列表
     */
    public function index(){

        $shopcontents=Shopcontent::paginate(3);

        return view("Shop/shopcontent/index",compact("shopcontents"));
    }
    /*
     * 添加
     */
    public function add(Request $request){
        $shoptypes=Shoptype::all();
        if ($request->isMethod("post")) {

//            判断是否符合条件
            $this->validate($request, [
                'dizhi' => 'required',
                'shoptype_id' => 'required',
                'name' => 'required',
                'pinpai' => 'required',
                'bao' => 'required',
                'piao' => 'required',
                'zhun' => 'required',
                'content' => 'required',
                'youhuixinxi' => 'required',
                'status' => 'required',
                'peisongfangshi' => 'required',
                'start_send' => 'required',
            ]);
//            接受图片
            $data = $request->all();
//            var_dump($data);exit;
            $data["logo"]="";
            if($request->file('logo')){
                $fileName=$request->file('logo')->store("books","images");
                $data["logo"]=$fileName;
            }
//            添加数据
            Shopcontent::create($data);
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("shopcontent.index");
        }
        //      显示视图
        return view("Shop/shopcontent/add",compact("shoptypes"));

    }
    /*
     * 编辑
     */
    public function edit(Request $request,$id){
        $shoptypes=Shoptype::all();
        $shopcontents=Shopcontent::find($id);

        if ($request->isMethod("post")) {

//            判断是否符合条件

//            接受图片
            $data = $request->all();
//            var_dump($data);exit;
            $data["logo"]="";
            if($request->file('logo')){
                $fileName=$request->file('logo')->store("books","images");
                $data["logo"]=$fileName;
            }
//            添加数据
            $shopcontents->update($request->all());
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("shopcontent.index");
        }
        //      显示视图
        return view("Shop/shopcontent/edit",compact("shopcontents","shoptypes"));

    }
    /*
     * 删除
     */
    public function del(Request $request,$id){
//        执行删除语句
        Shopcontent::find($id)->delete();

//        提示
        $request->session()->flash("success","删除成功");
//          添加成功，跳转
        return redirect()->route("shopcontent.index");
    }
}
