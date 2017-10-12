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
        if ( !empty($id) ) {
            //根据类别查询出手机的销量排行
            $phone = Cache::get('Hgoods'.$id);
            if (!$phone) {
                $phone = DB::table('goods')
                ->leftJoin('price', 'goods.id', 'price.gid')
                ->leftJoin('brands', 'brands.id', '=', 'goods.brandid')
                ->select('goods.id', 'goods.price', 'goods.brandid', 'goods.gname', 'goods.gpic', 'goods.workoff', 'brands.categoryid', 'bname', 'goods.status', 'price.gid')
                ->where([['goods.status', '>', 0],['brands.categoryid', '=', $id] ])
                ->orderBy('workoff', 'desc')
                ->limit(6)
                ->get()
                ->toArray();
                foreach ($phone as $k=>$v) {
                  $pid = DB::table('price')->select('id')->where('gid', $v->id)->first();
                  $phone[$k]->pid = $pid->id;
                }

                //放入缓存
                Cache::put('Hgoods'.$id, $phone, 24*60);

            }

        } else {
            $phone = [];
        }

        //查询商品总销量排行
        $salesVolume = Cache::get('goodsdata');
        if (!$salesVolume) {
            $salesVolume = DB::table('goods')
            ->leftJoin('price', 'goods.id', 'price.gid')
            ->select('goods.brandid', 'goods.price', 'goods.gname', 'goods.status', 'goods.id', 'goods.gpic', 'goods.workoff', 'price.gid', 'price.price')
            ->where('status', 1)
            ->orderBy('workoff', 'desc')
            ->limit(5)
            ->get()
            ->toArray();
            foreach ($salesVolume as $k=>$v) {
              $pid = DB::table('price')->select('id')->where('gid', $v->id)->first();
              $salesVolume[$k]->pid = $pid->id;
            }
            Cache::put('goodsdata', $salesVolume, 24*60);
        }


        $seckillList = DB::table('goods')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('price.id', 'gid', 'brandid', 'gname', 'workoff', 'goods.price', 'gpic', 'workoff')
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



    /**
     * 热销商品加载
     * @author Dengjihua <[<2563654031@qq.com>]>
     */
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
            // 根据类别得到对应的商品
            $hotProduct = DB::table('goods')
                ->leftJoin('price', 'goods.id', 'price.gid')
                ->leftJoin('brands', 'brands.id', '=', 'goods.brandid')
                ->select('goods.brandid', 'goods.price', 'goods.gname', 'goods.status', 'goods.id', 'goods.gpic', 'goods.workoff', 'price.gid', 'price.price')
                ->where([['goods.status', '>', 0],['brands.categoryid', '=', $class->id]])
                ->orderBy('workoff', 'desc')
                ->limit(6)
                ->get()
                ->toArray();

                foreach ($hotProduct as $k=>$v) {
                    $pid = DB::table('price')->select('id')->where('gid', $v->id)->first();
                    $hotProduct[$k]->pid = $pid->id;
                }

            // 将商品放入缓存中
            Cache::put('Hgoods'.$id, $hotProduct, 24*60);

        }
            if ($hotProduct) {
                  echo json_encode($hotProduct);
            } else {
            echo '404';
        }
    }



    /**
     * 新商品的加载
     * @author rong <[<871513137@qq.com>]>
     * @param  int    类别的id
     * @return object 新添加商品数据
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
        ->select('goods.id', 'gname', 'gpic', 'workoff', 'goods.price')
        ->orderBy('goods.addtime', 'desc')
        ->limit(6)
        ->where([['goods.status', '>', 0], ['home_category.id', '=', $id]])
        ->get()
        ->toArray();
        foreach ($newGoodsData as $k=>$v) {
            $pid = DB::table('price')->select('id')->where('gid', $v->id)->first();
            $newGoodsData[$k]->pid = $pid->id;
        }
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
       return $logo = DB::table('logo')->select('id', 'name', 'logo')->first();

    }
}
