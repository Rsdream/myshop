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

//后台路由
Route::prefix('/admin')->group(function () {
    Route::prefix('/index')->group(function () {
        Route::get('/rob', 'Admin\IndexController@rob');
    });
    Route::get('/', function () {
        return view('Admin/index');
    });
    //提交用户登陆信息
    Route::post('dologin','Admin\Api\LoginController@dologin');
    Route::get('login','Admin\IndexController@doLogin');
    Route::get('/makecode', 'Admin\Api\CommonController@buildCode');
    Route::get('/welcome', 'Admin\IndexController@welCome');
});
