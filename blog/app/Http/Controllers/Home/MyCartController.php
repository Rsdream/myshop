<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Model\Home\HomePrice;
use App\Model\Home\HomeGoods;
use DB;

class MyCartController extends Controller
{
    /**
    * @author kjw <[kjwlaravel@163.com]>
    */
    //购物车页面
	public function cart()
	{
		return view('Home/cart/cart');
	}

    //查看购物车内商品
    public function showCart()
    {
        //判断用户sessionID是否存在
    	if (Session::get('user') != '') {
    		//判断商品id是否存在
    		if ( Redis::exists('cart:ids:'.Session::getId()) ) {
    		    //获取用户没有登录时商品id
    			$oldKey = 'cart:ids:'.Session::getId();
    	        $oldIdsArr = Redis::sMembers($oldKey);

    	        //放入到sessionID新键中
    	        $setKey = 'cart:ids:'.Session::get('user');
    	        Redis::sAdd($setKey,  $oldIdsArr);
    	       //获取用户没有登录时购物车商品数据
    	        foreach ($oldIdsArr as $k) {
    		        $hashKey   = 'cart:'.Session::getId().':'.$k;
    		        $cartDatas = Redis::HGetAll($hashKey);
    		        $newKey    = 'cart:'.Session::get('user').':'.$k;
			    	    $bool      = Redis::exists($newKey);
			    	  //判断商品ID是否存在
			        if (!$bool) {
			        	//把用户没有登录时购物车中数据放入登录时以商品ID为的键中
			            Redis::hMSet($newKey, $cartDatas);
			        } else {
			        	//商品已存在，增加商品数量
			            Redis::hIncrBy($newKey, 'num', $cartDatas['num']);
			        }
			        //删除没有登录时用来存储商品数据的键
			        redis::del($hashKey);
    	        }
    	        ////删除没有登录时用来存储商品ID的键
    	        Redis::del($oldKey);
    		}
    		//用户登录
    		$key = 'cart:ids:'.Session::get('user');
    		$idsArr = Redis::sMembers($key);//拿出商品ID

    		//查询数据库中库存
    		$priceDatas = [];
    		foreach ($idsArr as $k) {
    			$priceDatas[] = DB::table('price')
		    	    ->select('stock', 'id')
		            ->where('id', '=', $k)
		            ->first();

            }
    		

    		//更新库存
    		foreach ($priceDatas as $k) {
                 $key = 'cart:'.Session::get('user').':'.$k->id;
                 Redis::hSet($key, 'stock', $k->stock);
    		}
    		//拿出购物车数据
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
    		//判断购物车中是否有商品
    		if ($cartDatas) {
    			echo json_encode($cartDatas);
    		} else {
    			echo json_encode('noshop');
    		}
    		exit;
    	}
    	//没有用户登录
    	$key    = 'cart:ids:'.Session::getId();
    	$idsArr = Redis::sMembers($key); //获取商品ID

		  //查询数据库中库存
		 $priceDatas = [];
		 foreach ($idsArr as $k) {
		 $priceDatas[] = DB::table('price')
	    	    ->select('stock', 'id')
	          ->where('id', '=', $k)
	          ->first();
		}
		//更新库存
		foreach ($priceDatas as $k) {
			$key = 'cart:'.Session::getId().':'.$k->id;
			Redis::hSet($key, 'stock', $k->stock);
		}
    	//拿出购物车数据
    	$cartDatas = [];
    	foreach ($idsArr as $k) {
    		$hashKey     = 'cart:'.Session::getId().':'.$k;
    		$cartDatas[] = Redis::HGetAll($hashKey);
    	}
    	//图片数据转化为数组类型
    	foreach ($cartDatas as $key => $value) {
    		$val = json_decode($value['gpic'], true);
    		$cartDatas[$key]['gpic'] = $val;
    	}
    	//判断购物车中是否有商品
    	if ($cartDatas) {
    		echo json_encode($cartDatas);
    	} else {
    		echo json_encode('noshop');
    	}
    }

    //添加商品到购物车
    public function addCart(Request $request)
    {
    	$id  = $request->input('id');
    	$num = $request->input('num');
    	$gid = intval($id);

    	//判断商品是否存在
    	if ($gid <=0 ) {

    		return redirect('/');
    	}
    	//用户登录时
    	if (Session::get('user') != '') {
    		//向数据获取商品信息
    		$goodDatas = $this->getGoodData($gid);
    		//没有商品信息
    		if (!$goodDatas) {

    			return redirect('/');
    		}
    		$key = 'cart:'.Session::get('user').':'.$gid;
    		$bool = Redis::exists($key);
    		//判断商品是否存在
    		if (!$bool) {
    			$goodDatas->num    = $num;
                $goodDatas->status = 0;
    			$array = $this->object2array($goodDatas);
    			//存储商品数据
    			Redis::hMSet($key, $array);
    			$setKey = 'cart:ids:'.Session::get('user');
    			//存储商品ID
    			Redis::sAdd($setKey, $gid);

                return 1;
    		} else {
    			//商品存在，仅增加商品数量
    			Redis::hIncrBy($key, 'num', $num);
    		}
    	    exit;
    	}
        //用户没有登录时
    	$goodDatas = $this->getGoodData($gid);

    	//判断数据库中是否有该商品信息存在
    	if (!$goodDatas) {

    		return redirect('/');
    	}
    	$key = 'cart:'.Session::getId().':'.$gid;
    	$bool = Redis::exists($key);

    	//判断商品是否存在
    	if (!$bool) {
    		$goodDatas->num = $num;
    		$array = $this->object2array($goodDatas);
    		//存储商品数据
    	    Redis::hMSet($key, $array);
    	    $setKey = 'cart:ids:'.Session::getId();
    	    //存储商品ID
    	    Redis::sAdd($setKey, $gid);

            return 1;
        } else {
        	//商品存在，仅增加商品数量
    	    Redis::hIncrBy($key, 'num', $num);
    	}
    }

    //删除商品
    public function delCart(Request $request)
    {
    	//获取对应id
    	$id = $request->input('id');
    	//用户登录时
    	if (Session::get('user') != '') {
    		$setKey = 'cart:ids:'.Session::get('user');
    		$key    = 'cart:'.Session::get('user').':'.$id;
    		//删除
    		Redis::del($key);
    		Redis::sRem($setKey, $id);
    		exit;
    	}
    	//用户没有登录时
    	$setKey = 'cart:ids:'.Session::getId();
    	$key = 'cart:'.Session::geTid().':'.$id;
    	//删除
    	Redis::del($key);
    	Redis::sRem($setKey, $id);
    }

    //修改商品数量
    public function changeCart(Request $request)
    {
    	//获取数据商品id,数量
    	$id  = $request->input('id');
    	$num = $request->input('num');
    	//用户登录时
    	if (Session::get('user') != '') {
    		$key = 'cart:'.Session::get('user').':'.$id;
    		//商品存在，仅增加该商品数量
    		Redis::hSet($key, 'num', $num);
    		exit;
    	}
    	//用户没有登录时
    	$key = 'cart:'.Session::getId().':'.$id;
    	//商品存在，仅增加该商品数量
    	Redis::hSet($key, 'num', $num);
    }

    //选择购买商品
    public function select(Request $request)
    {
        $id     = $request->input('id');
        $status = $request->input('status');
        //用户登录时
        if (Session::get('user') != '') {
            $key = 'cart:'.Session::get('user').':'.$id;
            //商品存在，选择商品
            Redis::hSet($key, 'status', $status);
        }
        //用户没有登录时
        $key = 'cart:'.Session::getId().':'.$id;
        //商品存在，选择商品
        Redis::hSet($key, 'status', $status);
    }

    //查询商品数据
    public function getGoodData($gid)
    {

    	$goods = '';
    	$goods = DB::table('goods')
    	    ->select('price.id', 'goods.gname', 'goods.gpic', 'price.price', 'ram', 'rom', 'color', 'price.stock')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->where('price.id', '=', $gid)
            ->first();
        $goods->setmeal = $goods->ram.'+'.$goods->rom.'+'.$goods->color;

        return $goods;
    }

    //查库存
    public function getStock(Request $request)
    {
    	$id = $request->input('id');
    	$goods = DB::table('price')
    	    ->select('stock')
            ->where('id', '=', $id)
            ->get()
            ->toArray();
        echo json_encode($goods);
    }

    //对象转换数组
	public function object2array($object) {
	    if (is_object($object)) {
	        foreach ($object as $key => $value) {
	            $array[$key] = $value;
	        }
	    } else {
	        $array = $object;
	    }

	  return $array;
	}
}
