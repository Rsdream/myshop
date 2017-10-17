<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;

class CollectionController extends Controller
{
    /**
    * @author kjw <[kjwlaravel@163.com]>
    */
	//加载收藏首页
    public function collection()
    {
        //判断用户是否登录
        //没有登录回到登录页
        if (Session::get('user') == '') {

            return redirect('/login');
        }

        return view('Home/collection/collection');
    }

    //展示收藏
    public function show()
    {
      	$uid = Session::get('user');
      	$arr = DB::table('collection_detail')
      	    ->select('id', 'gid', 'gname', 'gpic', 'workoff', 'status', 'uid', 'price')
      	    ->where('uid', '=', $uid)
            ->get();

      	$data =[];
      	//图片数据转化为数组类型
      	foreach ($arr as $k) {
            $goodsInfo = DB::table('goods')
                ->leftJoin('price', 'goods.id', '=', 'price.gid')
                ->select('goods.status', 'price.stock')
                ->where('price.id', $k->gid)
                ->get()
                ->toArray();
            foreach ($goodsInfo as $v) {
            		$data[] = [
            		    'id' => $k->id,
            		    'gname' => $k->gname,
                    'gid' => $k->gid,
                    'stock' => $v->stock,
            		    'gpic' => json_decode($k->gpic, true),
            		    'workoff' => $k->workoff,
            		    'status' => $v->status,
            		    'uid' => $k->uid,
            		    'price' => $k->price,
            		];
            }
      	}
      	echo json_encode($data);
    }

    //添加收藏
    public function add(Request $request)
    {
        //判断是否登录
    	  if (Session::get('user') == '') {
    		    return 0;
    	  }
      	$gid = $request->input('id');
      	$uid = Session::get('user');
      	//查询商品是否已收藏
      	$check = DB::table('collection_detail')
      	    ->select('id')
      	    ->where([['gid', '=', $gid], ['uid', $uid]])
      	    ->get();
      	if(!$check->isEmpty()) {
        		$data = DB::table('collection_detail')->where([['gid', '=', $gid], ['uid', $uid]])->delete();
        		echo json_encode($data);
        		exit;
      	}
        $data = DB::table('goods')
              ->join('price', function($join){$join->on('goods.id', '=', 'price.gid');})
              ->select('goods.id', 'goods.gpic','goods.workoff', 'goods.status', 'goods.gname', 'price.price')
              ->where('price.id', '=', $gid)
              ->get()
              ->toArray();
      	foreach ($data as $v) {
      		  $bool = DB::table('collection_detail')->insert([
      			   'gid'     => $gid,
      			   'uid'     => $uid,
      			   'gname'   => $v->gname,
      			   'gpic'    => $v->gpic,
      			   'workoff' => $v->workoff,
      			   'status'  => $v->status,
      			   'price'   => $v->price,
      		  ]);
      	}
        //已收藏
        return 1;
    }
}
