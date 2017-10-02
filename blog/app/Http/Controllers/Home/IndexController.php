<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class IndexController extends Controller
{
  /**
   * 加载首页数据
   * @author rong <[<871513137@qq.com>]>
   *
   */
    public function index()
    {
        $seckillList = DB::table('goods')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('price.id', 'brandid', 'gname', 'workoff', 'gpic', 'goods.price', 'workoff')
            ->where('attr', 2)
            ->get()
            ->toArray();

        $type = DB::table('home_category')
            ->select('id', 'name')
            ->get();
        return view('index', [
            'seckillList' => $seckillList,
            'type' => $type
        ]);
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
