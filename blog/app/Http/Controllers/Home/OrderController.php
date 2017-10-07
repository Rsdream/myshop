<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
use App\Model\Home\HomeDistrict;
use App\Model\Home\HomeOrders;
use App\Model\Home\OrdersGood;
use DB;


class OrderController extends Controller
{
    
    //订单页面
    public function check()
    {

        if (Session::get('user') == '') {
            return redirect('/login');
        }
    	//用户登录
    	$key = 'cart:ids:'.Session::get('user');
    	//拿出商品ID
    	$idsArr = Redis::sMembers($key);

    	//拿出购物车中数据
    	$cartDatas = [];
    	foreach ($idsArr as $k) {
    		$hashKey = 'cart:'.Session::get('user').':'.$k;
    		$cartDatas[] =Redis::HGetAll($hashKey);
    	}

    	//图片数据转化为数组
    	foreach ($cartDatas as $key => $value) {
    		$val = json_decode($value['gpic'], true);
    		$cartDatas[$key]['gpic'] = $val;
    	}
    	   return view('Home/order/check', ['orders'=>$cartDatas]);
    }

    //提交订单
    public function add(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $uid = Session::get('user');
        $number = rand(111111,999999);
        $sum = $request->input('sum');
        $data = time();

        HomeOrders::insert(['uid' => $uid, 'number' => $number, 'name' => $name, 'phone' => $phone, 'address' => $address, 'addtime' => $data]);

        //用户登录
        $key = 'cart:ids:'.Session::get('user');
        //拿出商品ID
        $idsArr = Redis::sMembers($key);

        //拿出购物车中数据
        $cartDatas = [];
        foreach ($idsArr as $k) {
            $hashKey = 'cart:'.Session::get('user').':'.$k;
            $cartDatas[] =Redis::HGetAll($hashKey);
        }

        //添加到商品订单        
        foreach ($cartDatas as $v) {
                $oid = $number;
                $gid = $v['id'];
                $gpic = $v['gpic'];
                $gname = $v['gname'];
                $gnum = $v['num'];
                $gprice= $v['price'];

                OrdersGood::insert(['oid' => $oid, 'gid' => $gid, 'gpic' => $gpic, 'gname' => $gname, 'gnum' => $gnum, 'gprice' => $gprice]);
        }

    }

    //成功下单
    public function success()
    {

        //用户登录
        $key = 'cart:ids:'.Session::get('user');
        //拿出商品ID
        $idsArr = Redis::sMembers($key);

        //拿出购物车中数据
        $cartDatas = [];
        foreach ($idsArr as $k) {
            $hashKey = 'cart:'.Session::get('user').':'.$k;
            Redis::del($hashKey);
        }
        Redis::del($key);

        return view('Home/success/success');
    }

    public function show()
    {
        $uid = Session::get('user');
        $orders = DB::table('orders_detail')->select('addtime', 'status', 'number')->where('uid', $uid)->get()->toArray();

        foreach ($orders as $v) {
            $goods = DB::table('orders_goods')->select('gid', 'gname', 'gprice', 'gnum')->where('oid', $v->number)->get()->toArray();
        }
        
        return view('Home/order/show', ['orders' => $orders, 'goods' => $goods]);
    }
   
}
