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


        $seckillList = DB::table('goods')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('price.id', 'brandid', 'gname', 'workoff', 'goods.price', 'gpic', 'workoff')
            ->where('attr', 2)
            ->get()
            ->toArray();

        $type = DB::table('home_category')
            ->select('id', 'name')
            ->get();
        $coverImg = DB::table('cover')->select('id', 'name', 'price')->get();
        $new = DB::table('goods')->select('id', 'price', 'gpic', 'workoff', 'gname')->orderBy('addtime', 'desc')->limit(6)->get();
  		  return view('index', ['category' => $category, 'phone' => $phone, 'salesvolume' => $salesVolume, 'seckillList' => $seckillList, 'type' => $type, 'new' => $new, 'coverImg' => $coverImg]);
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


    /**
     * 新商品加载
     * @author rong <[<871513137@qq.com>]>
     */
    public function newGoods(Request $request, $id)
    {

        if (Cache::has('newgoods:'.$id)){
            $newGoodsData = Cache::get('newgoods:'.$id);
            return $newGoodsData;
        }
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
        ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
        ->select('blogo')
        ->where([['goods.status', '>', 0], ['categoryid', '=', $id]])
        ->groupBy('blogo')
        ->limit(7)
        ->get()
        ->toArray();
        $goodsData = [
            'newgoods' => $newGoodsData,
            'logoimg' => $logoImg
        ];
        $expiresAt = Carbon::now()->addMinutes(1440);
        Cache::put('newgoods:'.$id, $goodsData, $expiresAt);
        return $goodsData;
    }

    /**
     * ajax二级菜单
     * @author rong <[871513137@qq.com]>
     */
     public function menu($id)
     {
        $menu = DB::table('brands')
            ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
            ->select('bname', 'brands.id', 'blogo')
            ->where([['brands.categoryid', $id], ['goods.status', '>', 0]])
            ->groupBy('brands.id', 'bname', 'blogo')
            ->get();
        $menuInfo = DB::table('brands')
            ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
            ->select('gname', 'goods.id', 'brandid')
            ->where([['brands.categoryid', $id], ['goods.status', '>', 0]])
            ->orderBy('goods.addtime', 'desc')
            ->get();
        foreach($menu as $k=>$v) {
            $x = 1;
            foreach($menuInfo as $val) {
                if ($v->id == $val->brandid && $x <= 5) {
                    $menu[$k]->menuinfo[] = $val;
                    $x++;
                }
            }
        }

        return $menu;

     }

     /**
      * 模板友情链接数据共享
      * @author rong <[871513137@qq.com]>
      * @return object $url
      */
      public function urlShareData()
      {
          //查出友情链接
          return $url = DB::table('url')->select('id', 'name', 'logo', 'url', 'status')->where('status', 0)->limit(5)->get();

      }

      /**
       * 模板站点logo数据共享
       * @author rong <[871513137@qq.com]>
       * @return object $logo
       */
       public function logoShareData()
       {
           //网站Logo
           return $logo = DB::table('logo')->select('id', 'name', 'logo')->where('id', '=', '1')->first();
       }
}
