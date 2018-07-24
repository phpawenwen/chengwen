<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Shop\BescController;
use App\Models\Shoptype;
use Barryvdh\Debugbar\Controllers\BaseController;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Shop\BescController as ShopBascController;

class ShoptypeController extends ShopBascController
{
    /*
     * 商家分类的列表
     */
    public function index()
    {
//        获取数据
        $shoptypes = Shoptype::paginate(3);
//        引入视图
        return view("Shop/shoptype/index",compact("shoptypes"));
    }
    //添加
    public function add(Request $request){

        if ($request->isMethod("post")) {

//            判断是否符合条件
            $this->validate($request, [
                'name' => 'required',
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
            Shoptype::create($data);
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("shoptype.index");
        }
        //      显示视图
        return view("Shop/shoptype/add");

    }
    //编辑
    public function edit(Request $request,$id){
//       通过id找到当前数据
        $shoptypes=Shoptype::find($id);
//        判断提交方式
        if($request->isMethod("post")){
//       验证数据是否符合规定
            $this->validate($request,[
                'name'=>"required",
            ]);

//         编辑数据
            $shoptypes->update($request->all());
//          提示
            $request->session()->flash("success","编辑成功");
//          添加成功，跳转
            return redirect()->route("Shop/shoptype/index");
        }

        //      显示视图
        return view("Shop/shoptype/edit",compact("shoptypes"));

    }
    //删除
    public function del(Request $request,$id){
//        执行删除语句
        Shoptype::find($id)->delete();

//        提示
        $request->session()->flash("success","删除成功");
//          添加成功，跳转
        return redirect()->route("shoptype.index");
    }
}
