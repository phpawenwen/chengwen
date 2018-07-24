<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\Menu_categories;
use App\Models\User;
use Barryvdh\Debugbar\Controllers\BaseController as aaa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Menu_categoriesController extends aaa
{
    /**菜品分类表的查看
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        读出所有数据并分页
        $menu_categories=Menu_categories::paginate(3);
//       dd(Menu_categories::user_id);
//        dd(Auth::user("menu_categories")->user_id);
//        引入视图并将数据导入视图
        return view("Shop/menu_categories/index",compact('menu_categories'));
    }

    /**菜品分类表的添加
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function add(Request $request){
//        $DATA=new Menu_categories();
//        dd($DATA->user_id);
//          $id=Menu_categories::where('');
//          dd($id);
//        $users=User::all();
//        var_dump($users);
        if($request->isMethod("post")){
            $this->validate($request, [
                'menu_name' => 'required',
                'type_accumulation' => 'required',
                'user_id' => 'required',
                'description' => 'required',
                'is_selected' => 'required',
            ]);
//            $data=$request->all();
//            var_dump($data);exit;

            if ($request->is_selected === "1") {

                   Menu_categories::where('is_selected', 1)->update(['is_selected' => 0]);

            }
            Menu_categories::create($request->all());
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("menu_categories.index");
        }

        return view("Shop/menu_categories/add",compact("users"));
    }

    /**菜品分类表的编辑
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request,$id){
        $menu_categories=Menu_categories::find($id);
        $users=User::all();
//        var_dump($users);
        if($request->isMethod("post")){
            $this->validate($request, [
                'menu_name' => 'required',
                'type_accumulation' => 'required',
                'user_id' => 'required',
                'description' => 'required',
                'is_selected' => 'required',
            ]);
            $data=$request->all();
//            var_dump($data);exit;
//            $ALL=Menu_categories->
            $menu_categories->update($request->all());
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("menu_categories.index");
        }

        return view("Shop/menu_categories/edit",compact("users","menu_categories"));
    }

    /**删除
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function del(Request $request,$id)
    {
//        得到当前分类
        $fenlei=Menu_categories::find($id);
//        得到当前分类里的店铺数
        $dianpushu=Menu::where("category_id",$fenlei->id)->count();

        if($dianpushu){
            return back()->with("当前分类下有菜品，不能删");
        }

        //删除语句
        Menu_categories::find($id)->delete();

//        提示
        $request->session()->flash("success","删除成功");
//          添加成功，跳转
        return redirect()->route("user.index");
    }
}
