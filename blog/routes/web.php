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

//前台首页
Route::get('/', function () {
    return view('index');
});

//登录，注册页面
Route::get('/login', function () {
    return view('Home/login/index');
});

//处理登录，注册
Route::post('doLogin','Api\LoginController@signIn');

//后台路由组
Route::prefix('/admin')->group(function () {
    //商城主页管理的路由组
    Route::prefix('/index')->group(function () {
        Route::get('/rob', 'Admin\IndexController@rob');
    });

    //会员管理路由组
    Route::prefix('/homeusers')->group(function () {
        //显示会员列表路由
        Route::get('/list', 'Admin\HomeUsersController@homeUsersList');
        //停用会员路由
        Route::post('/stopandstart', 'Admin\HomeUsersController@stopAndStart');
        //会员积分管理路由
        Route::get('/level', 'Admin\HomeUsersController@level');
    });

    Route::get('/', function () {
        return view('Admin/index');
    });

    //显示我的桌面路由
    Route::get('/welcome', 'Admin\IndexController@welCome');

});

//前台用户中心路由
Route::prefix('/user')->group(function () {
    Route::get('/myaccount', 'Home\IndexUserController@myAccount');
});

//产品管理路由组
Route::prefix('/admin/product')->group(function () {
    //产品分类资源控制器
    Route::resource('/category', 'Admin\Api\ProdectApi');
    //品牌管理资源控制器
    Route::resource('/brand', 'Admin\Api\BrandApi');
    //产品管理列表路由
    Route::get('/list', 'Admin\ProductController@list');
});
