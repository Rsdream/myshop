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
    public function check(Request $request)
    {
        $id = $request->input('like');

    	//拿出购物车中数据
        foreach ($id as $v) {
            $hashKey = 'cart:'.Session::get('user').':'.$v;
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


        //如果提交订单失败
        //事务回滚
        DB::transaction(function () use($name, $phone, $address, $uid, $number, $sum, $data){
            DB::table('orders_detail')->insert([
                'uid' => $uid, 
                'number' => $number, 
                'name' => $name, 
                'phone' => $phone, 
                'address' => $address, 
                'addtime' => $data
                ]);
        });

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

    //查看订单
    public function show()
    {
        $uid = Session::get('user');
        $data = DB::table('orders_detail as d')
            ->leftJoin('orders_goods as g', 'd.number', '=', 'g.oid')
            ->select('d.id', 'd.addtime', 'd.status', 'd.number', 'g.gpic', 'g.gid', 'g.gname', 'g.gprice', 'g.gnum')
            ->where('d.uid', '=', $uid)
            ->get()
            ->toArray();
        if ($data) {
            return view('Home/order/show', ['data' => $data]);
        } else {
            return view('Home/order/show', [$v = '']);
        }
        
    }

    //修改订单状态
    public function change(Request $request)
    {
        $id     = $request->input('id');
        $status = $request->input('status');

        if ($status == '等待发货') {
            echo json_encode('等待发货');
            exit;
        } else if ($status == '确认收货') {
            $status = 2;
            echo json_encode('等待评价');
        } else if ($status == '等待评价') {
            echo json_encode('等待评价');
            exit;
        } else if ($status == '订单完成') {
            echo json_encode('订单完成');
            exit;
        }

        //如果确认收货失败
        //回滚事务
        DB::transaction(function () use($id, $status) {
            $data = DB::table('orders_detail')->where('id', $id)->update(['status' => $status]);
        });

    }

    //发表订单评论
    public function commentlist(Request $request)
    {
        $number = $request->input('number');

        $data = DB::table('orders_goods')
                ->select('id', 'gname', 'gpic', 'gprice')
                ->where('oid', '=', $number)
                ->where('status', '=', '0')
                ->get()
                ->toArray();

        return view('Home/order/commentlist', ['data' => $data]);
    }

    //处理订单评论
    public function comment(Request $request)
    {
        $gid = $request->input('id');
        $comment = $request->input('comment');
        $addtime = time();
        $uid = Session::get('user');

        //添加数据到订单评论表
        DB::table('orders_comment')->insert(
            ['gid' => $gid, 'comment' => $comment, 'addtime' => $addtime, 'uid' => $uid]
        );

        //修改商品评论状态
        $a = DB::table('orders_goods')
            ->where('id', $gid)
            ->update(['status' => 1]);

        //订单评论完成，订单就完成
        //修改订单状态
        //查出订单编号
        $data = DB::table('orders_goods')
            ->where('gid', '=', $gid)
            ->select('oid')
            ->get()
            ->toArray();

            //根据订单编号查出商品评论状态
            foreach ($data as $v) {
                $status = DB::table('orders_goods')
                    ->where('oid', '=', $v->oid)
                    ->select('status')
                    ->get()
                    ->toArray(); 

                $val = false;
                foreach ($status as $v) {
                    if($v->status == 0) {
                        $val = true;                  
                        break;
                    }
                        if ($val) {
                            echo '';
                        } else {
                            foreach ($data as $v) {

                                //如果‘订单完成’修改失败
                                //事务回滚
                                DB::transaction(function () use($v) {
                                    DB::table('orders_detail')->where('number', '=', $v->oid)->update(['status' => 3]);
                                });
                                
                        }
                    }
                }
            }

        return redirect('order/showComment');
    }

    //查看订单评论
    public function showComment()
    {
        $uid = Session::get('user');

        $data = [];
        //查询出当前用户订单
        $data = DB::table('orders_comment')
            ->select('addtime', 'gid', 'comment')
            ->where('uid', '=', $uid)
            ->get()
            ->toArray();

        $data = DB::table('orders_comment')          
            ->join('orders_goods', function($join)  
            {  
                $join->on('orders_goods.gid', '=', 'orders_comment.gid');  
            })->select('orders_comment.addtime', 'orders_comment.comment',
                'orders_goods.gname', 'orders_goods.gpic', 'orders_goods.status')                    
                ->where('orders_goods.status', '=', 1)  
                ->orderBy('orders_comment.addtime', 'desc')
                ->get()
                ->toArray();

        return view('Home/order/comment', ['data' => $data]);

    } 

    //申请退款
    public function backlist(Request $request)
    {
        $number = $request->input('id');
        $uid = Session::get('user');

        $data = DB::table('orders_goods')
            ->select('id', 'oid', 'gname', 'gpic', 'gnum', 'gprice', 'gid')
            ->where('back_status', '=', 0)
            ->get()
            ->toArray();       

        return view('Home/order/backlist', ['data' => $data]);
    }

    //处理退款订单
    public function back(Request $request)
    {
        $bid = $request->input('id');
        $comment = $request->input('comment');
        $addtime = time();
        $number = rand(111111,999999);

        //添加数据到订单评论表
        DB::table('orders_back')->insert([ 
            'comment' => $comment, 
            'addtime' => $addtime,
            'number' => $number,
            'bid' => $bid,
            ]
        );

        //修改退款商品状态
        $a = DB::table('orders_goods')
            ->where('id', $bid)
            ->update(['back_status' => 1]);

        //订单评论完成，订单就完成
        //修改订单状态
        //查出订单编号
        $data = DB::table('orders_goods')
            ->where('gid', '=', $bid)
            ->select('oid')
            ->get()
            ->toArray();

            //根据订单编号查出商品评论状态
            foreach ($data as $v) {
                $status = DB::table('orders_goods')
                    ->where('oid', '=', $v->oid)
                    ->select('back_status')
                    ->get()
                    ->toArray(); 

                $val = false;
                foreach ($status as $v) {
                    if($v->back_status == 0) {
                        $val = true;                  
                        break;
                    }
                        if ($val) {
                            echo '';
                        } else {
                            foreach ($data as $v) {

                                //如果‘订单完成’修改失败
                                //事务回滚
                                DB::transaction(function () use($v) {
                                    DB::table('orders_detail')->where('number', '=', $v->oid)->update(['back_status' => 1]);
                                });
                                
                        }
                    }
                }
            }

        return redirect('order/showBack');
    }

    //查看退款订单
    public function showBack()
    {
        $uid = Session::get('user');

        //查出当前用户退款订单
        $data = DB::table('orders_back')          
            ->join('orders_goods', function($join)  
            {  
                $join->on('orders_goods.id', '=', 'orders_back.bid');  
            })->select('orders_back.addtime', 'orders_back.number', 'orders_back.status', 'orders_back.id',
                      'orders_goods.gname', 'orders_goods.gpic', 'orders_goods.gnum', 'orders_goods.gprice')
                ->where('orders_goods.back_status', '=', 1)  
                ->orderBy('orders_back.addtime', 'desc')
                ->get()
                ->toArray();

        return view('Home/order/back', ['data' => $data]);
    }

    //取消退款
    public function drawBack(Request $request)
    {
        $id     = $request->input('id');
        $status = $request->input('status');

        //如果‘取消退款’状态修改失败
        //事务回滚
        DB::transaction(function () use($id, $status) {
            $data = DB::table('orders_back')->where('id', $id)->update(['status' => $status]);
            echo json_encode($data);
        });    
    }   
   
}
