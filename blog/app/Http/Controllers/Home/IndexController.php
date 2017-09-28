<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Cache;

class IndexController extends Controller
{
    
	public function index()
	{

        //查询所有类别
        $category = DB::table('home_category')->select('name', 'id')->get()->toArray();
        // 得到手机的类别id
        for ($i=0;$i<count($category);$i++) {

        	if ($category[$i]->name == '手机') {
        		$id = $category[$i]->id;
        	}
        }

        //根据类别查询出手机的销量排行
       	$phone = DB::table('goods')
            ->leftJoin('brands', 'brands.id', '=', 'goods.brandid')
            ->select('goods.id', 'goods.brandid', 'goods.gname', 'goods.gpic', 'goods.workoff', 'brands.categoryid', 'bname')
            ->where('brands.categoryid', '=', $id)
            ->orderBy('workoff', 'desc')
            ->limit(6)
            ->get()
            ->toArray();


        //查询商品总销量排行
        $salesVolume = DB::table('goods')->select('brandid', 'gname', 'id', 'gpic', 'workoff')->orderBy('workoff', 'desc')->limit(5)->get();


        //查出友情链接
        $url = DB::table('url')->select('id', 'name', 'logo', 'url', 'status')->where('status', 0)->limit(5)->get();


        //网站Logo
        $logo = DB::table('logo')->select('id', 'name', 'logo')->where('id', '=', '1')->first();

		return view('index', ['category' => $category, 'phone' => $phone, 'salesvolume' => $salesVolume, 'url' => $url, 'logo' => $logo]);
	}


	//接收ajax传过来的id，查出对应类别的商品
	public function hotSale()
	{

		// var_dump($_POST);
		$id = $_POST['id'];
		// var_dump($id);

		//得到类别
		$class = DB::table('home_category')->select('id', 'name')->where('id', '=', $id)->first();

        //先查缓存中有无商品
		$hotProduct = Cache::get('Hgoods'.$id);
        if (!$hotProduct) {
            // echo '没有缓存';
            //根据类别得到对应的商品
            $hotProduct = DB::table('goods')
                ->leftJoin('brands', 'brands.id', '=', 'goods.brandid')
                ->select('goods.id', 'goods.brandid', 'goods.gname', 'goods.gpic', 'goods.workoff', 'brands.categoryid', 'bname')
                ->where('brands.categoryid', '=', $class->id)
                ->orderBy('workoff', 'desc')
                ->limit(6)
                ->get()
                ->toArray();
            //将商品放入缓存中
            Cache::put('Hgoods'.$id, $hotProduct,1);

        }
		
		if ($hotProduct) {
			echo json_encode($hotProduct);
		}

	}
    
}
