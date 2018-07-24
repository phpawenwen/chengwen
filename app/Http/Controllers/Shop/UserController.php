<?php

namespace App\Http\Controllers\Shop;


use App\Models\Shopcontent;
use App\Models\Shoptype;
use App\Models\User;
use App\Http\Controllers\Shop\BescController as ShopBascController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends ShopBascController
{
    /*
     * 注册
     */
    public function reg(Request $request){
        $shoptypes=Shoptype::all();
//        $shopcontents=Shopcontent::all();
        if ($request->isMethod("post")) {
//            判断是否符合条件
//            $this->validate($request, [
//                'name' => 'required',
//                'password' => 'required',
//                'email' => 'required',
//            ]);
//          var_dump($fileName);exit;

            DB::transaction(function () use($request) {

                $data = $request->all();
//            var_dump($data);exit;
                $data["logo"]="";
                if($request->file('logo')) {
                    $fileName = $request->file('logo')->store("books", "images");
                    $data["logo"] = $fileName;
                }

                $data["password"]=bcrypt($data["password"]);
                $shopcontent=Shopcontent::create($data);
                $data['shop_id']=$shopcontent->id;
                User::create($data);
            });

//            var_dump($shopcontent->id);exit;

//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("user.login");
        }
        return view("shop/user/reg",compact("shoptypes"));
    }
    /*
     * 登录
     */
     public function login(Request $request)
     {
//         dd(Shoptype::all());exit;
//         判断提交方式
        if($request->isMethod("post")){
//            判断是否符合条件
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required',
            ]);
            $data=$request->all();
//            var_dump($data);exit;
            if(Auth::attempt(['name'=>$request->post('name'),'password'=>$request->post('password')])){
//            echo "登陆成功";
//                  提示
                $request->session()->flash("success","登录成功");
                //        显示列表
//                return redirect()->route('user.index');
//                dd(Auth::user()->status);
               if(Auth::user()->status==1){
                   Auth::logout();
                   return "你的账号还在审核中";

               }
                if(Auth::user()->status==0){
                    return redirect()->route("user.index");
                }
                if(Auth::user()->status==2){
                    Auth::logout();
                    return "你的账号不存在";
                }

            }else{
                $request->session()->flash("success","登录失败");
                //        显示列表
//                  return redirect()->route("users.login");
//                  新方法
                return redirect()->back()->withInput();
//                  echo "登陆失败";
            }
        }
       return view("shop/user/login",compact("shoptypes"));
     }
    /*
     * 列表
     */
    public function index(){
        $users=User::paginate(3);
        return view("shop/user/index",compact("users"));
    }
    /*
     * 添加
     */
    public function add(Request $request){
        $shoptypes=Shoptype::all();
        if ($request->isMethod("post")) {

//            判断是否符合条件
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required',
                'email' => 'required',
            ]);

            DB::transaction(function () use($request) {

                $data = $request->all();
                $data["password"]=bcrypt($data["password"]);
                $shopcontent=Shopcontent::create($data);

                $data['shop_id']=$shopcontent->id;
                User::create($data);
            });
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("user.index");
        }
        return view("shop/user/add",compact("shoptypes"));
    }
    /*
    * 编辑
    */
    public function edit(Request $request,$id){
        $shopcontents=Shopcontent::all();
        $users=User::find($id);
//        var_dump($users);exit;
        if ($request->isMethod("post")) {

//            判断是否符合条件
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required',
                'email' => 'required',
            ]);

//            $data = $request->all();
//            var_dump($data);exit;
//            添加数据
            $users->update($request->all());
//          提示
            $request->session()->flash("success", "添加成功");
//          添加成功，跳转
            return redirect()->route("user.index");
        }
        return view("shop/user/edit",compact("shopcontents","users"));
    }
    /*
     *
     * 删除
     */
    public function del(Request $request,$id){
//        执行删除语句
        User::find($id)->delete();

//        提示
        $request->session()->flash("success","删除成功");
//          添加成功，跳转
        return redirect()->route("user.index");
    }
    /*
     * 退出
     */
    public function logout(Request $request)
    {
        Auth::logout();
        //        提示
        $request->session()->flash("success","退出成功");
        //        显示列表
        return redirect()->route('user.login');
    }
}
