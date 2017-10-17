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
    /**
    * @author kjw <[kjwlaravel@163.com]>
    */
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

            $pro  = HomeDistrict::select(['id', 'name'])->where('id', $v->pro)->first();
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
        $text    = '';
        $id      = $request->input('like');
        $name    = $request->input('myname');
        $phone   = $request->input('myphone');
        $address = $request->input('myaddress');
        $text    = $request->input('text');
        $uid     = Session::get('user');
        $score   = $request->input('score');
        $number  = rand(111111,999999);
        $time    = time();
        //未知错误！出现过$name值无法获取;
        if ($name == null) {
            return back();
        }
        //用户登录
        $key       = 'cart:ids:'.Session::get('user');
        $cartDatas = [];
        foreach ($id as $k) {
            $hashKey = 'cart:'.Session::get('user').':'.$k;
            $cartDatas[] =Redis::HGetAll($hashKey);
        }
        $tPrice = 0; //计算总金额
        if (!$cartDatas) {
            return redirect('cart');
        }
        foreach ($cartDatas as $v) {
            $tPrice += $v['num'] * $v['price'];
        }
        $tPrice += 10;
        //如果提交订单失败
        //事务回滚
        if (!empty($score)) {
            $score = DB::table('home_users')->select('score')->where('id', session('userinfo')['id'])->first();
            $score = floor($score->score / 100);
            if ($score > $tPrice) {
                DB::table('home_users')->where('id', $uid)->decrement('score', $tPrice * 100);
                $score = $tPrice;
                $tPrice = 0;
            } else {
                $tPrice -= $score;
                DB::table('home_users')->where('id', $uid)->decrement('score', $score * 100);
            }
        } else {
            $score = 0;
        }

        DB::transaction(function () use($name, $phone, $address, $uid, $number, $tPrice, $text, $time, $score){
            DB::table('orders_detail')->insert([
                'uid' => $uid,
                'number' => $number,
                'name' => $name,
                'phone' => $phone,
                'tprice' => $tPrice,
                'oscore' => $score,
                'address' => $address,
                'addtime' => $time,
                'text' => $text,
            ]);
        });

        //删除相对Redis对应键
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
            $oid     = $number;
            $gid     = $v['id'];
            $setmeal = $v['setmeal'];
            $gpic    = $v['gpic'];
            $gname   = $v['gname'];
            $gnum    = $v['num'];
            $gprice  = $v['price'];
            OrdersGood::insert([
                'oid'     => $oid,
                'gid'     => $gid,
                'gpic'    => $gpic,
                'gname'   => $gname,
                'gnum'    => $gnum,
                'gprice'  => $gprice,
                'setmeal' => $setmeal
            ]);
            $stock = DB::table('price')
                ->select('stock')
                ->where('id', '=', $gid)
                ->first();
            DB::table('price')
                ->where('id', '=', $gid)
                ->update(['stock' => $stock->stock-$gnum]);
        }

        return redirect('order/success');
    }

    //下单成功
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
            ->orderBy('addtime', 'desc')
            ->paginate(6);
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
        $status = DB::table('orders_detail')->select('status')->where('id', '=', $id)->first();
        if ($status->status == '0') {
            echo json_encode('0');
        } else if ($status->status == '1') {
            echo json_encode('1');
            DB::transaction(function () use($id) {
                $data = DB::table('orders_detail')->where('id', $id)->update(['status' => 2]);
            });
        } else if ($status->status == '2') {
            echo json_encode('2');
            DB::transaction(function () use($id) {
                $data = DB::table('orders_detail')->where('id', $id)->update(['status' => 3]);
            });
        } else if ($status->status == '3') {
            echo json_encode('3');
        }
        $uid = session('userinfo')['id'];
        //如果确认收货失败
        //回滚事务
        DB::transaction(function () use($id, $status, $uid) {
            $price = DB::table('orders_detail')->select('tprice', 'oscore')->where('id', $id)->first();
            $score = ($price->tprice + $price->oscore) / 10;
            $score = floor($score);
            $order = DB::table('orders_detail as o')
                ->leftJoin('orders_goods as g', 'o.number', '=', 'oid')
                ->leftJoin('price as p', 'g.gid', '=', 'p.id')
                ->select('p.gid', 'g.gnum')
                ->where('o.id', $id)
                ->get();
            foreach ($order as $v) {
                DB::table('goods')->where('id', $v->gid)->increment('workoff', $v->gnum);
            }
            DB::table('home_users')->where('id', $uid)->increment('score', $score);
            DB::table('home_users')->where('id', $uid)->increment('growth', $price->tprice + $price->oscore);
        });

    }

    //发表订单评论
    public function commentlist(Request $request)
    {
        //根据订单编号找出要评论商品
        $number = $request->input('number');
        $data   = DB::table('orders_goods')
            ->select('id', 'gid', 'gname', 'gpic', 'gprice', 'oid', 'id', 'setmeal')
            ->where('oid', '=', $number)
            ->where('status', '=', 0)
            ->get()
            ->toArray();

        return view('Home/order/commentlist', ['data' => $data]);
    }

    //处理订单评论
    public function comment(Request $request)
    {
        $gid     = $request->input('gid');
        $oid     = $request->input('oid');
        $id      = $request->input('id');
        $comment = $request->input('comment');
        $addtime = time();
        $uid     = Session::get('user');

        //添加数据到订单评论表
        DB::table('orders_comment')->insert([
            'gid' => $gid,
            'comment' => $comment,
            'addtime' => $addtime,
            'uid' => $uid,
            'number' => $oid]
        );

        //修改商品评论状态
        $a = DB::table('orders_goods')
            ->where('gid', $id)
            ->update(['status' => 1]);
        //查出对应评论商品状态
        $status = DB::table('orders_goods')
            ->where('oid', '=', $oid)
            ->select('status')
            ->get()
            ->toArray();
        //每一个订单中所有商品进行判断是否已经被评论
        $val = false;
        foreach ($status as $v) {
            if($v->status == '0') {
                $val = true;
                break;
            }
        }
        //订单中所有商品已经评论完成
        //修改订单状态，订单结束
        if (!$val) {
            DB::table('orders_detail')->where('number', '=', $oid)->update(['status' => 3]);
        }

        return redirect('order/commentlist?number='.$oid.'')->with('commentlist', '评论成功!');
    }

    //查看订单评论
    public function showComment()
    {
        $uid = Session::get('user');
        //查询出当前用户订单
        $data = DB::table('orders_comment')
            ->join('orders_goods', 'orders_goods.id', '=', 'orders_comment.gid')
            ->select('orders_comment.id',
                'orders_comment.addtime',
                'orders_comment.comment',
                'orders_comment.text',
                'orders_goods.gname',
                'orders_goods.setmeal',
                'orders_goods.gpic')
            ->where('uid', '=', $uid)
            ->orderBy('orders_comment.addtime', 'desc')
            ->get();

        return view('Home/order/comment', ['data' => $data]);
    }

    //申请退款
    public function backlist(Request $request)
    {
        //查询出要退款商品信息
        $number = $request->input('id');
        $uid    = Session::get('user');
        $data   = DB::table('orders_goods')
            ->select('id', 'oid', 'gname', 'gpic', 'gnum', 'gprice', 'gid', 'setmeal')
            ->where('back_status', '=', 0)
            ->where('oid', '=', $number)
            ->get()
            ->toArray();

        return view('Home/order/backlist', ['data' => $data]);
    }

    //处理退款订单
    public function back(Request $request)
    {
        $bid     = $request->input('id');
        $oid     = $request->input('oid');
        $comment = $request->input('comment');
        $addtime = time();
        $number  = rand(111111,999999);

        //添加数据到订单评论表
        DB::table('orders_back')->insert([
            'comment' => $comment,
            'addtime' => $addtime,
            'number'  => $number,
            'bid'     => $bid,
        ]);
        //修改退款商品状态
        DB::table('orders_goods')
            ->where('id', $bid)
            ->update(['back_status' => 1]);

         return redirect('order/backlist?id='.$oid.'')->with('backlist', '申请提交成功!');;
    }

    //删除订单
    public function del(Request $request)
    {
        //根据订单编号删除对应订单
        $number = $request->input('number');
        $goods = DB::table('orders_goods')->where('oid', '=', $number)->delete();
        $data = DB::table('orders_detail')->where('number', '=', $number)->delete();
        if (!$goods && !$data) {
            echo json_encode(1);
        }
    }

    //查看退款订单
    public function showBack()
    {
        $uid = Session::get('user');
        //查出当前用户退款订单
        $data = DB::table('orders_back')
            ->join('orders_goods', function($join){$join->on('orders_goods.id', '=', 'orders_back.bid');})
                ->select('orders_back.addtime',
                    'orders_back.number',
                    'orders_back.status',
                    'orders_back.id',
                    'orders_goods.gname',
                    'orders_goods.gpic',
                    'orders_goods.gnum',
                    'orders_goods.gprice',
                    'orders_goods.setmeal')
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
        $check = DB::table('orders_back')
        //判断商品是否已退款
        ->select('id')
        ->where('id', '=', $id)
        ->where('status', '=', 1)
        ->get();
        if ($check->first()) {
            echo json_encode(1);
            exit;
        }
        $back = DB::table('orders_back')
            ->select('id')
            ->where('id', '=', $id)
            ->where('status', '=', 2)
            ->get();
        if ($back->first()) {
            echo json_encode(2);
            exit;
        }
        //如果‘取消退款’状态修改失败
        //事务回滚
        DB::transaction(function () use($id, $status) {
            $data = DB::table('orders_back')
                ->where('id', $id)
                ->update(['status' => $status]);
            if ($data) {
            	echo json_encode(3); //失败
            } else {
            	echo json_encode(4); //成功
            }
        });
    }

}
