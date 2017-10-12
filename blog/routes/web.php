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

//后台路由组
Route::prefix('/admin')->group( function () {

    //后台中间键，判断是否登录
    Route::middleware(['admin_user'])->group(function () {
        //商城主页管理的路由组
        Route::prefix('/index')->group(function () {
            Route::get('/rob', 'Admin\IndexController@rob');
        });

        Route::get('/', function () {
            return view('Admin/index');
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

        //后台用户管理组
        Route::group(['prefix' => 'rbac', 'middleware' => 'rbac.role:superadmin,admin,guest'], function () {
            //角色管理
            Route::get('/role', 'Admin\Administrator\RoleController@index')->middleware('rbac.permission:role-list,role-create,role-show,role-details,role-delete,role-update');
            Route::get('/role/create', 'Admin\Administrator\RoleController@create')->middleware('rbac.permission:role-create');
            Route::post('/role/create', 'Admin\Administrator\RoleController@store')->middleware('rbac.permission:role-create');
            Route::get('/role/{id}', 'Admin\Administrator\RoleController@show')->middleware('rbac.permission:role-show');
            Route::patch('/role/{id}', 'Admin\Administrator\RoleController@update')->middleware('rbac.permission:role-update');
            Route::get('/role/details/{id}', 'Admin\Administrator\RoleController@details')->middleware('rbac.permission:role-details');
            Route::get('role/delete/{id}', 'Admin\Administrator\RoleController@delete')->middleware('rbac.permission:role-delete');

            //权限管理
            Route::get('/permission', 'Admin\Administrator\PermissionController@index');
            Route::get('/permission/create', 'Admin\Administrator\PermissionController@create');
            Route::post('/permission/create', 'Admin\Administrator\PermissionController@store');
            Route::get('/permission/{id}', 'Admin\Administrator\PermissionController@show');
            Route::patch('/permission/{id}', 'Admin\Administrator\PermissionController@update');

            //管理员列表
            Route::get('/user','Admin\Administrator\UserController@index')->middleware('rbac.permission:user-list,user-create,user-show,user-details,user-delete,user-update,user-disable,user-stop');
            Route::get('/user/create','Admin\Administrator\UserController@create')->middleware('rbac.permission:user-create');
            Route::post('/user/create', 'Admin\Administrator\UserController@store')->middleware('rbac.permission:user-create');
            Route::get('/user/{id}', 'Admin\Administrator\UserController@show')->middleware('rbac.permission:user-show,user-update');
            Route::post('/user/aa/{id}', 'Admin\Administrator\UserController@update')->middleware('rbac.permission:user-update,user-show');
            Route::get('/user/details/{id}', 'Admin\Administrator\UserController@details')->middleware('rbac.permission:user-details');
            Route::get('/user/disable/{id}', 'Admin\Administrator\UserController@disable')->middleware('rbac.permission:user-disable');
            Route::get('/user/desc/stop', 'Admin\Administrator\UserController@showDisable')->middleware('rbac.permission:user-stop');
        });


        //后台系统管理->友情链接
        Route::resource('/url', 'Admin\Systron\Url');
        Route::get('/disable', 'Admin\Systron\Url@disable');

        //网站logo的路由
        Route::get('logo', 'Admin\Systron\Logo@index');
        Route::get('addlogo', 'Admin\Systron\Logo@add');
        Route::post('insertlogo', 'Admin\Systron\Logo@insert');
        Route::get('editlogo/{id}', 'Admin\Systron\Logo@edit');
        Route::post('update', 'Admin\Systron\Logo@update');

        //后台意见反馈路由
        Route::get('feedback','Admin\Systron\Feedback@index');
        Route::get('delfeedback/{id}', 'Admin\Systron\Feedback@delete');

        //后台退出路由组
        route::get('/out','Admin\Api\CommonController@Out');
        //轮播图资源控制器
        Route::resource('/coverplan', 'Admin\CoverPlanController');
        //轮播图的删除
        Route::get('cover/del/{id}', 'Admin\CoverPlanController@del');
    });



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
        //订单评论
        Route::get('/feedback', 'Admin\Order\OrderController@feedBack');
        //订单回复
        Route::post('/reply', 'Admin\Order\OrderController@reply');
    });


    //后台登录路由
    Route::get('login','Admin\IndexController@doLogin');
    Route::get('/makecode', 'Admin\Api\CommonController@buildCode');
    //提交用户登陆信息
    Route::post('dologin','Admin\Api\LoginController@dologin');


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

//前台意见反馈路由
Route::get('feedback','Home\Feedback@index');
Route::post('in-feedback', 'Home\Feedback@insert');


//产品管理路由组
Route::prefix('admin/product')->group(function () {
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
    //商品图片列表路由
    Route::get('/goods/imglist/{id}', 'Admin\Product\GoodsController@goodsImgShow');
    //删除商品图片路由
    Route::get('/goods/imgdel/{id}', 'Admin\Product\GoodsController@goodsImgdel');

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

//找回密码
Route::get('/forget', 'Home\ForgetController@forget');
Route::post('/handle', 'Home\ForgetController@handle');
Route::post('/send', 'Home\ForgetController@send');

//处理注册
Route::post('/doregister', 'Home\RegisterController@doregister');



//搜索
Route::get('/search', 'Home\SearchController@search');

//购物车资源路由
Route::prefix('/cart')->group(function () {
    //购物车首页
    Route::get('/', 'Home\MyCartController@cart');
    //查看购物车商品
    Route::get('/show', 'Home\MyCartController@showCart');
    //添加商品到购物车
    Route::get('/add', 'Home\MyCartController@addCart');
    //移除商品
    Route::post('/del', 'Home\MyCartController@delCart');
    //修改商品数量
    Route::post('/change', 'Home\MyCartController@changeCart');
    //选择购买商品
    Route::post('/select', 'Home\MyCartController@select');
    //查库存
    Route::post('/stock', 'Home\MyCartController@getStock');
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
    //删除订单
    Route::post('/del', 'Home\OrderController@del');
    //申请退款
    Route::get('/backlist', 'Home\OrderController@backlist');
    //取消退款
    Route::post('/drawBack', 'Home\OrderController@drawBack');
    //处理订单评论
    Route::post('/back', 'Home\OrderController@back');
    //展示订单退款列表
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
    //选择默认地址
    Route::post('/change', 'Home\AddressController@change');
    Route::post('/showChange', 'Home\AddressController@showChange');
    //编辑
    Route::post('/update', 'Home\AddressController@update');

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

//加载秒杀商品路由
Route::get('/seckill', 'Home\IndexController@seckill');
//加载新品推介路由
Route::get('/newgoods/{id}', 'Home\IndexController@newGoods')->where('id', '\d+');
//商品列表路由
Route::get('/goods/list/{type}/{id}', 'Home\GoodsListController@list')->where('id', '\d+');
//商品详情页路由
Route::get('/goods/detail/{id}', 'Home\GoodsListController@goodsDetail')->where('id', '\d+');
//home用户退出
Route::get('/queit', 'Home\LoginController@queit');

//热销商品路由
Route::post('/hotsale', 'Home\IndexController@hotsale');

//异步加载二级菜单
Route::get('/menu/{id}', 'Home\IndexController@menu')->where('id', '\d+');
//加载商品详情页第二章路由
Route::get('/goods/detailtwo/{id}', 'Home\GoodsListController@goodsDetailTwo')->where('id', '\d+');
//请求图片
Route::get('/img/{id}', 'Home\GoodsImgApi@getImg')->where('id', '\d+');
//查看商品评论
Route::get('/goods/comment/{id}', 'Home\GoodsListController@getGoodsComment')->where('id', '\d+');
//商品评论的分页
Route::get('/goods/commentpage/{id}', 'Home\GoodsListController@commentPage')->where('id', '\d+');
