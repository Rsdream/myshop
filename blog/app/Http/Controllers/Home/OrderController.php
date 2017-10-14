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
        //判断用户是否登录
        if (Session::get('user') == '') {

            return redirect('/login');
        }
        $number = $request->input('number');
        $id     = $request->input('like');
    	//拿出购物车中数据
        foreach ($id as $v) {
            //判断库存是否为0
            $stock = DB::table('price')->select('stock')->where('id', $v)->first();
            if (intval($number) > intval($stock->stock)) {
                return redirect('/cart');
            }
            $hashKey = 'cart:'.Session::get('user').':'.$v;
            $cartDatas[] =Redis::HGetAll($hashKey);
        }
    	//图片数据转化为数组
    	foreach ($cartDatas as $key => $value) {
    		$val = json_decode($value['gpic'], true);
    		$cartDatas[$key]['gpic'] = $val;
    	}

        $data = DB::table('orders_address')
            ->select('id', 'name', 'phone', 'pro', 'city', 'area', 'comment', 'status')
            ->where('uid', Session::get('user'))
            ->where('status', 1)
            ->get();
        $add = [];
        foreach ($data as $v) {

            $pro = HomeDistrict::select(['id', 'name'])->where('id', $v->pro)->first();
            $city = HomeDistrict::select(['id', 'name'])->where('id', $v->city)->first();
            $area = HomeDistrict::select(['id', 'name'])->where('id', $v->area)->first();
            $add[] = [
            'id'      => $v->id,
            'pro'     => $pro->name,
            'city'    => $city->name,
            'area'    => $area->name,
            'name'    => $v->name,
            'phone'   => $v->phone,
            'comment' => $v->comment,
            'status'  => $v->status,
            ];
        }
        $score = DB::table('home_users')->select('score')->where('id', session('userinfo')['id'])->first();
    	  return view('Home/order/check', ['orders'=>$cartDatas, 'address' => $add, 'score' => $score->score]);
    }

    //提交订单
    public function add(Request $request)
    {
        $text = '';
        $id=$request->input('like');
        $name=$request->input('uname');
        $phone=$request->input('uphone');
        $address=$request->input('address');
        $text=$request->input('text');
        $uid = Session::get('user');
        $score = $request->input('score');
        $number = rand(111111,999999);
        $time = time();

        //用户登录
        $key = 'cart:ids:'.Session::get('user');
        $cartDatas = [];
        foreach ($id as $k) {
            $hashKey = 'cart:'.Session::get('user').':'.$k;
            $cartDatas[] =Redis::HGetAll($hashKey);
        }

        $tPrice = 0;
        if (!$cartDatas) {
            return redirect('cart');
        }
        foreach ($cartDatas as $v) {
            $tPrice += $v['num'] * $v['price'];
        }

        //如果提交订单失败
        //事务回滚
        if (!empty($score)) {
            $score = DB::table('home_users')->select('score')->where('id', session('userinfo')['id'])->first();
            $score = floor($score->score / 100);
            $tPrice -= $score;
            $uid = session('userinfo')['id'];
            DB::table('home_users')->where('id', $uid)->decrement('score', $score * 100);
        } else {
            $score = 0;
        }
        DB::transaction(function () use($name, $phone, $address, $uid, $number, $tPrice, $text, $time, $score){
            DB::table('orders_detail')->insert([
                'uid' => $uid,
                'number' => $number,
                'name' => $name,
                'phone' => $phone,
                'tprice' => $tPrice + 10,
                'oscore' => $score,
                'address' => $address,
                'addtime' => $time,
                'text' => $text,
                ]);
        });

        //删除
        $setKey = 'cart:ids:'.Session::get('user');
        //拿出购物车中数据
        $datas = [];
        foreach ($id as $k) {
            $hashKey = 'cart:'.Session::get('user').':'.$k;
            Redis::del($hashKey);
            Redis::sRem($setKey, $id);
        }


        //添加到商品订单
        foreach ($cartDatas as $v) {
                $oid = $number;
                $gid = $v['id'];
                $setmeal = $v['setmeal'];
                $gpic = $v['gpic'];
                $gname = $v['gname'];
                $gnum = $v['num'];
                $gprice= $v['price'];

                OrdersGood::insert(['oid' => $oid, 'gid' => $gid, 'gpic' => $gpic, 'gname' => $gname, 'gnum' => $gnum, 'gprice' => $gprice, 'setmeal' => $setmeal]);
                $stock = DB::table('price')->select('stock')->where('id', '=', $gid)->first();
                DB::table('price')->where('id', '=', $gid)->update(['stock' => $stock->stock-$gnum]);
        }

        return redirect('order/success');
    }

    //成功下单
    public function success()
    {
        return view('Home/success/success');
    }

    //查看订单
    public function show()
    {
      //判断用户是否登录
      if (Session::get('user') == '') {

          return redirect('/login');
      }
        $uid = Session::get('user');
        $data = DB::table('orders_detail')
            ->select('id', 'addtime', 'status', 'number' , 'tprice', 'oscore')
            ->where('uid', '=', $uid)
            ->get()
            ->toArray();
            foreach ($data as $k => $v) {
                $data[$k]->orderDetail = DB::table('orders_goods as o')
                    ->leftJoin('price', 'price.id', 'o.gid')
                    ->select('o.id', 'o.oid', 'o.gid', 'o.gname', 'o.gpic', 'o.gnum', 'o.gprice', 'ram', 'rom', 'color')
                    ->where('oid', $v->number)
                    ->get()
                    ->toArray();
            }
        return view('Home/order/show', ['data' => $data]);
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
        $uid = session('userinfo')['id'];

        //如果确认收货失败
        //回滚事务
        DB::transaction(function () use($id, $status, $uid) {
            $data = DB::table('orders_detail')->where('id', $id)->update(['status' => $status]);
            $price = DB::table('orders_detail')->select('tprice')->where('id', $id)->first();
            $score = $price->tprice / 10;
            $score = floor($score);
            DB::table('home_users')->where('id', $uid)->increment('score', $score);
            DB::table('home_users')->where('id', $uid)->increment('growth', $price->tprice);
        });

    }

    //发表订单评论
    public function commentlist(Request $request)
    {
        $number = $request->input('number');
        $data = DB::table('orders_goods')
                ->select('gid', 'gname', 'gpic', 'gprice', 'oid', 'id')
                ->where('oid', '=', $number)
                ->where('status', '=', '0')
                ->get()
                ->toArray();

        return view('Home/order/commentlist', ['data' => $data]);
    }

    //处理订单评论
    public function comment(Request $request)
    {
        $gid = $request->input('gid');
        $oid = $request->input('oid');
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

        return redirect('order/commentlist?number=$oid');
    }

    //查看订单评论
    public function showComment()
    {
        $uid = Session::get('user');

        $data = [];
        //查询出当前用户订单

                $users = DB::table('orders_comment')
                            ->join('orders_goods', 'orders_comment.gid', '=', 'orders_goods.gid')
                            ->select('orders_comment.addtime', 'orders_comment.comment',
                                'orders_goods.gname', 'orders_goods.gpic', 'orders_goods.status')
                                ->where('orders_goods.status', '=', 1)
                                ->where('orders_comment.uid', '=', $uid)
                                ->orderBy('orders_comment.addtime', 'desc')
                                ->get()
                                ->toArray();
dd($data);
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
