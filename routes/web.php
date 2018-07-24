<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//商户

//平台
Route::domain('shop.elema.com')->namespace('Shop')->group(function () {
    //店铺分类
    Route::get('shoptype/index',"ShoptypeController@index")->name("shoptype.index");
    Route::any('shoptype/add',"ShoptypeController@add")->name("shoptype.add");
    Route::any('shoptype/edit/{id}',"ShoptypeController@edit")->name("shoptype.edit");
    Route::get('shoptype/del/{id}',"ShoptypeController@del")->name("shoptype.del");

    //店铺信息
    Route::get('shopcontent/index',"ShopcontentController@index")->name("shopcontent.index");
    Route::any('shopcontent/add',"ShopcontentController@add")->name("shopcontent.add");
    Route::any('shopcontent/edit/{id}',"ShopcontentController@edit")->name("shopcontent.edit");
    Route::get('shopcontent/del/{id}',"ShopcontentController@del")->name("shopcontent.del");


    //商家
    Route::get('user/index', "UserController@index")->name("user.index");
    Route::any('user/add', "UserController@add")->name("user.add");
    Route::any('user/reg', "UserController@reg")->name("user.reg");
    Route::any('user/login', "UserController@login")->name("user.login");
    Route::get('user/logout', "UserController@logout")->name("user.logout");
    Route::any('user/edit/{id}', "UserController@edit")->name("user.edit");
    Route::get('user/del/{id}', "UserController@del")->name("user.del");

    //菜品分类表
    Route::get('menu_categories/index',"Menu_categoriesController@index")->name("menu_categories.index");
    Route::any('menu_categories/add',"Menu_categoriesController@add")->name("menu_categories.add");
    Route::any('menu_categories/edit/{id}',"Menu_categoriesController@edit")->name("menu_categories.edit");
    Route::get('menu_categories/del/{id}',"Menu_categoriesController@del")->name("menu_categories.del");

//    菜单处理
    Route::get('menu/index',"MenuController@index")->name("menu.index");
    Route::any('menu/add',"MenuController@add")->name("menu.add");
    Route::any('menu/edit/{id}',"MenuController@edit")->name("menu.edit");
    Route::get('menu/del/{id}',"MenuController@del")->name("menu.del");
});



//平台
Route::domain('admin.elema.com')->namespace('Admin')->group(function () {


//    管理员
    Route::get('admins/index', "AdminsController@index")->name("admins.index");
    Route::any('admins/add', "AdminsController@add")->name("admins.add");
    Route::any('admins/edit/{id}', "AdminsController@edit")->name("admins.edit");
    Route::get('admins/del/{id}', "AdminsController@del")->name("admins.del");
    Route::any('admins/login', "AdminsController@login")->name("admins.login");
    Route::any('admins/logout', "AdminsController@logout")->name("admins.logout");

//   管理员对商户和商铺进行增删改查
    Route::get('shopcon/index', "ShopconController@index")->name("shopcon.index");
    Route::any('shopcon/add', "ShopconController@add")->name("shopcon.add");
    Route::any('shopcon/edit/{id}', "ShopconController@edit")->name("shopcon.edit");
    Route::get('shopcon/del/{id}', "ShopconController@del")->name("shopcon.del");

    //   管理员对商铺类型进行增删改查
    Route::get('shopty/index', "ShoptyController@index")->name("shopty.index");
    Route::any('shopty/add', "ShoptyController@add")->name("shopty.add");
    Route::any('shopty/edit/{id}', "ShoptyController@edit")->name("shopty.edit");
    Route::get('shopty/del/{id}', "ShoptyController@del")->name("shopty.del");


});
