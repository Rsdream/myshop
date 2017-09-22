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
// Route::post('doLogin','Api\LoginController@signIn');

//后台路由
Route::prefix('/admin')->group(function () {
    Route::prefix('/index')->group(function () {
        Route::get('/rob', 'Admin\IndexController@rob');
    });

    Route::get('/', function () {
        return view('Admin/index');
    });

    Route::get('/welcome', 'Admin\IndexController@welCome');

});


//获取验证码
Route::get('/makecode', 'Api\CommonApi@buildCode');

//获取手机验证码
Route::post('/phonecode', 'Api\CommonApi@phoneCode');

//判断用户名是否存在
Route::post('/existence', 'Home\RegisterController@isExistence');

//处理登录
Route::post('/dologin', 'Home\LoginController@doLogin');

//处理注册
Route::post('/doregister', 'Home\RegisterController@doregister');