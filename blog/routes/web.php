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
Route::get('/', 'Home\IndexController@index');

//登录，注册页面
Route::get('/login', 'Home\LoginController@login');
//处理登录，注册
// Route::post('doLogin','Api\LoginController@signIn');

//后台路由组
Route::prefix('/admin')->group(function () {
    //商城主页管理的路由组
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



    //角色权限
    Route::resource('/role', 'Admin\Administrator\Role');

    //权限管理
    Route::resource('/permission', 'Admin\Administrator\Permission');


    //管理员列表
    Route::resource('/adminlist', 'Admin\Administrator\AdminList');
    Route::post('/update/{id}', 'Admin\Administrator\AdminList@update')->where('id','\d');




   	// Route::get('product/delete/{gayquan}', 'Admin\ProductController@destroy')
    //     ->where(['gayquan' => '\d+']);
    //秒杀商品列表路由
    Route::resource('/seckill', 'Admin\SeckillController');
});

//前台用户中心路由
Route::prefix('/user')->group(function () {
    //验证是否有登录
    Route::middleware(['home.auth'])->group(function () {
        //个人中心首页
        Route::get('/myaccount', 'Home\IndexUserController@myAccount');
        //个人资料
        Route::get('/information', 'Home\IndexUserController@information');
        //收货地址
        Route::get('/address', 'Home\IndexUserController@address');
        //添加地址
        Route::get('/address/add', 'Home\IndexUserController@add');
        //编辑
        Route::get('/address/edit/{id}', 'Home\IndexUserController@edit');
        //执行添加地址
        Route::post('/address/exadd', 'Home\Api\AddressApi@exAdd');
        //获取省市区地址
        Route::get('/select', 'Home\Api\AddressApi@select');
        //执行修改
        Route::post('/address/exedit/{id}', 'Home\Api\AddressApi@exEdit');
        //执行删除地址
        Route::get('/address/delete/{id}', 'Home\Api\AddressApi@delete');
        //修改用户信息
        Route::post('/userinfo/update', 'Home\IndexUserController@infoUpdate');
    });
});

//产品管理路由组
Route::prefix('/admin/product')->group(function () {
    //产品分类资源控制器
    Route::resource('/category', 'Admin\Product\ProdectController');
    //品牌管理资源控制器
    Route::resource('/brand', 'Admin\Product\BrandController');
    //删除品牌路由
    Route::post('/delbrand', 'Admin\Product\BrandController@destroy');
    //商品管理资源控制器
    Route::resource('/goods', 'Admin\Product\GoodsController');
    //添加商品的加载品牌路由
    Route::post('/goodsbrand', 'Admin\Product\GoodsController@goodsBrand');
    //添加商品的上传图片路由
    Route::post('/goodsimg/{id}', 'Admin\Product\GoodsController@goodsImg');
    //商品的上架和下架路由
    Route::post('/goods/status', 'Admin\Product\GoodsController@stopAndStart');

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
//搜索
Route::get('/search', 'Home\SearchController@search');
//加载秒杀商品路由
Route::get('/seckill', 'Home\IndexController@seckill');
//加载新品推介路由
Route::get('/newgoods/{id}', 'Home\IndexController@newGoods');
//商品列表路由
Route::get('/goods/list/{type}/{id}', 'Home\GoodsListController@list');
//商品详情页路由
Route::get('/goods/detail/{id}', 'Home\GoodsListController@goodsDetail');
//home用户退出
Route::get('/queit', 'Home\LoginController@queit');
