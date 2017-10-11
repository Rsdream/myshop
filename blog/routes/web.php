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
Route::get('/', 'Home\IndexContrller@index');

//登录，注册页面
Route::get('/login', function () {
    return view('Home/login/index');
});
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

    //订单管理路由组
    Route::prefix('/order')->group(function () {
        //显示订单列表路由
        Route::get('/', 'Admin\Order\OrderController@order');
        //修改订单状态路由
        Route::post('/change', 'Admin\Order\OrderController@change');        
        //查看订单商品详情
        Route::get('/show', 'Admin\Order\OrderController@show');
        //显示退款订单列表路由
        Route::get('/back', 'Admin\Order\OrderController@back');
        //修改退款状态
        Route::post('/drawBack', 'Admin\Order\OrderController@drawBack');
    });



    //角色权限
    Route::resource('/role', 'Admin\Administrator\Role');

    //权限管理
    Route::resource('/permission', 'Admin\Administrator\Permission');


    //管理员列表
    Route::resource('/adminlist', 'Admin\Administrator\AdminList');
    Route::post('/update/{id}', 'Admin\Administrator\AdminList@update')->where('id','\d');



});

//前台用户中心路由
Route::prefix('/user')->group(function () {
    Route::get('/myaccount', 'Home\IndexUserController@myAccount');
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
    Route::post('/goodsimg', 'Admin\Product\GoodsController@goodsImg');

});

//获取验证码
Route::get('/makecode', 'Api\CommonApi@buildCode');

//获取手机验证码
Route::post('/phonecode', 'Api\CommonApi@phoneCode');

//判断用户名是否存在
Route::post('/existence', 'Home\RegisterController@isExistence');

//处理登录
Route::post('/dologin', 'Home\LoginController@doLogin');
Route::get('/outlogin', 'Home\LoginController@outLogin');

//处理注册
Route::post('/doregister', 'Home\RegisterController@doregister');
//搜索
Route::get('/search', 'Home\SearchController@search');



//购物车资源路由
Route::prefix('/cart')->group(function () {    
    //购物车首页
    Route::get('/', 'Home\CartController@cart');
    //查看购物车商品
    Route::get('/show', 'Home\CartController@showCart');

    //添加商品到购物车
    Route::get('/add', 'Home\CartController@addCart');

    //移除商品
    Route::post('/del', 'Home\CartController@delCart');

    //修改商品数量
    Route::post('/change', 'Home\CartController@changeCart');

});


//订单资源路由
Route::prefix('/order')->group(function () {    
    //结算页面
    Route::get('/', 'Home\OrderController@check');

    //提交订单
    Route::post('/add', 'Home\OrderController@add');

    //成功提交订单
    Route::get('/success', 'Home\OrderController@success');

    //订单展示
    Route::get('/show', 'Home\OrderController@show');

    //订单状态修改
    Route::post('/change', 'Home\OrderController@change');

    //发表订单评论
    Route::get('/commentlist', 'Home\OrderController@commentlist');

    //订单退货
    Route::get('/back', 'Home\OrderController@back');

    //处理订单评论
    Route::post('/comment', 'Home\OrderController@comment'); 

    //查看订单评论
    Route::get('/showComment', 'Home\OrderController@showComment');

    //申请退款
    Route::get('/backlist', 'Home\OrderController@backlist');

    //取消退款
    Route::post('/drawBack', 'Home\OrderController@drawBack');

    //处理订单评论
    Route::post('/back', 'Home\OrderController@back');    

    //处理订单评论
    Route::get('/showBack', 'Home\OrderController@showBack'); 

});

//地址资源路由
Route::prefix('/address')->group(function () {    
    //三级联动
    Route::post('/select', 'Home\AddressController@select');

    //添加地址
    Route::post('/add', 'Home\AddressController@add');    

    //显示地址
    Route::post('/show', 'Home\AddressController@show');   

    //删除地址
    Route::post('/del', 'Home\AddressController@del');

    //默认地址添加
    Route::post('/tacit', 'Home\AddressController@tacit');

});

//收藏资源路由
Route::prefix('/collection')->group(function () {    
    //收藏首页
    Route::get('/', 'Home\CollectionController@collection');

    //添加收藏
    Route::get('/add', 'Home\CollectionController@add');

    //展示收藏
    Route::post('/show', 'Home\CollectionController@show');

});

