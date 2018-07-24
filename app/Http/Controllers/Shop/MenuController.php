<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\Menu_categories;
use App\Models\User;
use Barryvdh\Debugbar\Controllers\BaseController as bbb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends bbb
{
    /**菜单列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $menus=Menu::paginate(3);
       return view("Shop/menu/index",compact("menus"));
    }

    /**菜单的添加
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        $menu_categories=Menu_categories::all();
        $users=User::all();
        if($request->isMethod("post")){

//            接受图片
            $data = $request->all();
//            var_dump($data);exit;
            $data["goods_img"]="";
            if($request->file('goods_img')){
                $fileName=$request->file('goods_img')->store("books","images");
                $data["goods_img"]=$fileName;
            }
            Menu::create($data);
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("menu.index");
        }

        return view("Shop/menu/add",compact("menu_categories","users"));
    }

    /**菜单的编辑
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request,$id)
    {
        $menu_categories=Menu_categories::all();
        $users=User::all();
        $menus=Menu::find($id);
        if($request->isMethod("post")){

//            接受图片
            $data = $request->all();
//            var_dump($data);exit;
            $data["goods_img"]="";
            if($request->file('goods_img')){
                $fileName=$request->file('goods_img')->store("books","images");
                $data["goods_img"]=$fileName;
            }
            $menus->update($data);
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("menu.index");
        }

        return view("Shop/menu/edit",compact("menu_categories","users","menus"));
    }


    public function del(Request $request,$id){

        Menu::find($id)->delete();
//        提示
        $request->session()->flash("success","删除成功");
//          添加成功，跳转
        return redirect()->route("menu.index");
    }
}
