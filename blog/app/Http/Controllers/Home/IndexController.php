<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

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


		return view('index', ['category' => $category, 'phone' => $phone, 'salesvolume' => $salesVolume]);
	}


	public function hotSale()
	{

		// var_dump($_POST);
		$id = $_POST['id'];
		// var_dump($id);

		//得到类别
		$class = DB::table('home_category')->select('id', 'name')->where('id', '=', $id)->first();

		//根据类别得到对应的商品
		$phone = DB::table('goods')
            ->leftJoin('brands', 'brands.id', '=', 'goods.brandid')
            ->select('goods.id', 'goods.brandid', 'goods.gname', 'goods.gpic', 'goods.workoff', 'brands.categoryid', 'bname')
            ->where('brands.categoryid', '=', $class->id)
            ->orderBy('workoff', 'desc')
            ->limit(6)
            ->get()
            ->toArray();

		if ($phone) {
			echo json_encode($phone);
		}

	}
    
}
