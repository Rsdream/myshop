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

Route::get('/admin', function () {
    return view('Admin/index');
});

Route::get('/admin/list', function () {
    return 'asdadsa';
});
