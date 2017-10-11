<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;

class CollectionController extends Controller
{

	//加载收藏首页
    public function collection()
    {
    	return view('Home/collection/collection');
    }

    //展示收藏
    public function show()
    {
    	$uid = Session::get('user');
    	$arr = DB::table('collection_detail')
    	    ->select('id', 'gname', 'gpic', 'workoff', 'status', 'uid', 'price')
    	    ->where('uid', '=', $uid)
            ->get();

    	 $data =[];
    	//图片数据转化为数组类型
    	foreach ($arr as $k) {
    		$data[] = [
    		    'id' => $k->id,  
    		    'gname' => $k->gname,  
    		    'gpic' => json_decode($k->gpic, true),  
    		    'workoff' => $k->workoff,  
    		    'status' => $k->status,  
    		    'uid' => $k->uid,  
    		    'price' => $k->price,  
    		];
  		
    	}
    		echo json_encode($data);

    	
    }

    //添加收藏
    public function add(Request $request)
    {    	
        //判断是否登录
    	if (Session::get('user') == '') {
    		dd('请登录');
    	}

    	$gid = $request->input('id');
    	$uid = Session::get('user');

    	
    	//查询商品是否已收藏
    	$check = DB::table('collection_detail')
    	    ->select('id')
    	    ->where('gid', '=', $gid)
    	    ->get();

    	if(!$check->isEmpty()) {
    		$data = DB::table('collection_detail')->where('gid', '=', $gid)->delete();
    		echo json_encode($data);
    		exit;
    	}

        $data = DB::table('goods')          
            ->join('price', function($join)  
            {$join->on('goods.id', '=', 'price.gid');})
                ->select('goods.id', 'goods.gpic','goods.workoff', 'goods.status', 'goods.gname', 'price.price')                    
                    ->where('goods.id', '=', $gid)  
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
    }
}
