<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class IndexController extends Controller
{
    
	public function index()
	{

        // dd(session('userinfo'));
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
        $logo = DB::table('logo')->select('id', 'name', 'logo')->first();

        $seckillList = DB::table('goods')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('price.id', 'brandid', 'gname', 'workoff', 'gpic', 'workoff')
            // ->where('attr', 2)
            ->get()
            ->toArray();

        $type = DB::table('home_category')
            ->select('id', 'name')
            ->get();

		return view('index', ['category' => $category, 'phone' => $phone, 'salesvolume' => $salesVolume, 'url' => $url, 'logo' => $logo, 'seckillList' => $seckillList, 'type' => $type]);
	}


	// 热销商品 接收ajax传过来的id，查出对应类别的商品
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
            Cache::put('Hgoods'.$id, $hotProduct, 60*24);

        }
		
		if ($hotProduct) {
			echo json_encode($hotProduct);
		} else {
            echo '404';
        }

	}
    
    
    /**
     * 新商品加载
     * @author rong <[<871513137@qq.com>]>
     */
    public function newGoods(Request $request, $id)
    {

        // if (Cache::has('newgoods:'.$id)){
        //     $newGoodsData = Cache::get('newgoods:'.$id);
        //     return $newGoodsData;
        // }
        $newGoodsData = DB::table('home_category')
        ->leftJoin('brands', 'home_category.id', '=', 'brands.categoryid')
        ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
        ->select('goods.id', 'gname', 'gpic', 'workoff', 'price')
        ->orderBy('goods.addtime', 'desc')
        ->limit(6)
        ->where([['goods.status', '>', 0], ['home_category.id', '=', $id]])
        ->get()
        ->toArray();
        $logoImg = DB::table('brands')
        ->select('blogo')
        ->where('categoryid', '=', $id)
        ->limit(7)
        ->get()
        ->toArray();
        $goodsData = [
            'newgoods' => $newGoodsData,
            'logoimg' => $logoImg
        ];
        // $expiresAt = Carbon::now()->addMinutes(1440);
        // Cache::put('newgoods:'.$id, $newGoodsData, $expiresAt);
        return $goodsData;
   }
}
