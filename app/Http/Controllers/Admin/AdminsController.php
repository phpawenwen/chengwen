<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins;
use App\Models\Shopcontent;
use App\Models\Shoptype;
use Barryvdh\Debugbar\Controllers\BaseController as bbbb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AdminsController extends bbbb
{

    /**管理员列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
//        读出数据+分页
        $admins=Admins::paginate(3);
//        引入视图
        return view("admin/admins/index",compact("admins"));
    }

    /**管理员添加
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function add(Request $request){
        if ($request->isMethod("post")) {
//            判断是否符合条件

            $this->validate($request, [
                'name' => 'required',
                'password' => 'required',
                'email' => 'required',
            ]);
           $data=$request->all();
//           var_dump($data);exit;
            $data["password"]=bcrypt($data["password"]);
           Admins::create($data);
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("admins.index");
        }
//        引入视图
        return view("admin/admins/add");
    }

    /**管理员编辑
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request,$id){
        $admins=Admins::find($id);
//        $this->authorize('update',$admins);
////        Redis::set("s",12);
////        //取值
////        return    Redis::get("s");
//           return "aaaa";exit;
        if ($request->isMethod("post")) {
//            判断是否符合条件

            $this->validate($request, [
                'name' => 'required',
                'password' => 'required',
                'email' => 'required',
            ]);
//            $data=$request->all();
//           var_dump($data);exit;
            $admins->update($request->all());
//          提示
            $request->session()->flash("success", "编辑成功");
//          添加成功，跳转
            return redirect()->route("admins.index");
        }
//        引入视图
        return view("admin/admins/edit",compact("admins"));
    }

    /**管理员删除
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function del(Request $request,$id){
//        执行删除语句
        Admins::find($id)->delete();

//        提示
        $request->session()->flash("success","删除成功");
//          添加成功，跳转
        return redirect()->route("admins.index");
    }

    /**登录
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login(Request $request)
    {
//         判断提交方式
        if($request->isMethod("post")){
//            判断是否符合条件
//            $this->validate($request, [
//                'name' => 'required',
//                'password' => 'required',
//            ]);
//            $data=$request->all();
//            var_dump($data);exit;
            if(Auth::guard("admin")->attempt(['name'=>$request->post('name'),'password'=>$request->post('password')])){
//            echo "登陆成功";
//                  提示
                $request->session()->flash("success","登录成功");
                //        显示列表
                return redirect()->route('admins.index');
            }else{
                $request->session()->flash("success","登录失败");
                //        显示列表
//                  return redirect()->route("users.login");
//                  新方法
                return redirect()->back()->withInput();
//                  echo "登陆失败";
            }
        }
        return view("admin/admins/login");
    }

    /**退出
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function logout(Request $request)
    {
//        var_dump("aaaaa");exit;
        Auth::guard("admin")->logout();
        //        提示
        $request->session()->flash("success","退出成功");
        //        显示列表
        return redirect()->route('admins.login');
    }

}
