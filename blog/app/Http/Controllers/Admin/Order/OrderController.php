<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
	//展示订单
	public function order()
	{

        $orders = DB::table('orders_detail')
            ->select('id', 'addtime', 'status', 'number', 'name', 'phone', 'address', 'text')
            ->orderBy('addtime', 'desc')
            ->paginate(10);
		return view('Admin/order-detail', ['orders' => $orders]);
	}

    //查看订单商品详情
    public function show(Request $request)
    {
        $number = $request->input('number');
        $goods = DB::table('orders_goods')
            ->select('id', 'gname', 'gprice', 'gnum', 'oid', 'setmeal')
            ->where('oid', '=', $number)
            ->get()
            ->toArray();
        return view('Admin/order-show', ['goods' => $goods]);
    }

	//修改订单状态
	public function change(Request $request)
	{
		$id     = $request->input('id');
		$status = $request->input('status');

		if ($status == '等待发货') {
			$status = 1;
            echo json_encode('等待收货');
        } else if ($status == '等待收货') {
            echo json_encode('等待收货');
            exit;
        } else if ($status == '等待评价') {
            echo json_encode('等待评价');
            exit;
        } else if ($status == '订单完成') {
            echo json_encode('订单完成');
            exit;
        }

        //如果‘等待收货’状态修改失败
        //事务回滚
        DB::transaction(function () use($id, $status) {
        	$data = DB::table('orders_detail')->where('id', $id)->update(['status' => $status]);
        });
	}

    //展示退款订单列表
    public function back()
    {
        $data = DB::table('orders_goods')
            ->join('orders_back', 'orders_back.bid', '=', 'orders_goods.id')
            ->join('orders_detail', 'orders_goods.oid', '=', 'orders_detail.number')
            ->select('orders_detail.phone', 'orders_detail.name', 'orders_back.id',
                    'orders_goods.gname', 'orders_goods.gnum', 'orders_goods.gprice', 'orders_goods.setmeal',
                    'orders_back.addtime', 'orders_back.number', 'orders_back.status', 'orders_back.id', 'orders_back.comment')
            ->orderBy('orders_back.id', 'desc')
            ->get()
            ->toArray();
            
        return view('Admin/order-back', ['data' => $data]);
    }

    //修改退款订单状态
    public function drawBack(Request $request)
    {
        $id     = $request->input('id');
        $status = $request->input('status');

        //是否取消退款
        $check = DB::table('orders_back')->select('id')->where('id', '=', $id)->where('status', '=', 3)->get();

        if ($check->first()) {
                echo json_encode('退款关闭');
               exit;
        }

        //如果‘等待收货’状态修改失败
        //事务回滚
        DB::transaction(function () use($id, $status) {
            $data = DB::table('orders_back')->where('id', $id)->update(['status' => $status]);
        });

        if ($status == '1') {
            echo json_encode('同意退款');
        } else {
            echo json_encode('退款驳回');
        }
    }

    //订单评论
    public function feedBack()
    {
        $data = DB::table('orders_comment')
            ->join('orders_detail', 'orders_comment.number', '=', 'orders_detail.number')
            ->join('orders_goods', 'orders_comment.gid', '=', 'orders_goods.id')
            ->select('orders_comment.addtime', 'orders_comment.comment', 'orders_detail.name', 'orders_detail.phone', 'orders_comment.text', 'orders_comment.id', 'orders_goods.gname', 'orders_goods.setmeal')
            ->orderBy('orders_comment.addtime', 'desc')
            ->paginate(10);

        return view('Admin/feed-list', ['data' => $data]);
    }

    //订单评论回复
    public function reply(Request $request)
    {
        $id = $request->input('id');
        $text = $request->input('value');
        $data = DB::table('orders_comment')
            ->where('id', $id)
            ->update(['text' => $text]);
        echo json_encode($data);
    }
}
