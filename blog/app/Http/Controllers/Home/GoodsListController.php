<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * 商品列表控制器
 * @author rong <[<871513137@qq.com>]>
 *
 */
class GoodsListController extends Controller
{
    /**
     * 商品列表页
     * @author $id   商品的品牌id | 商品的类别id
     * @author $type 访问的类型
     */
    public function list(Request $request, $type, $id)
    {
        switch ($type) {
            case 'category':
                $goodsData = $this->category($id);
                // dd($goodsData);
                break;
            case 'brand':
                $goodsData = $this->brand($id);
                break;
            default:
                dd(3);
                break;
        }
        $category = $this->type();
        return view('Home/goods/shop', [
            'goodsData' => $goodsData,
            'category' => $category,
        ]);
    }

    /**
     * 以类别查询商品
     * @author $id   品牌的类别id
     * @return array $goodsData 商品数据
     */
    public function category($id)
    {
        $goodsData = DB::table('home_category')
        ->leftJoin('brands', 'home_category.id', '=', 'brands.categoryid')
        ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
        ->leftJoin('price', 'goods.id', '=', 'price.gid')
        ->select('price.id', 'gname', 'gpic', 'workoff', 'price.price')
        ->orderBy('goods.addtime', 'desc')
        ->limit(12)
        ->where([['goods.status', '>', 0], ['home_category.id', '=', $id]])
        ->paginate(12);
        return $goodsData;
    }

    /**
     * 以品牌查询商品
     * @author $id   商品的品牌id
     * @return array $goodsData 商品数据
     */
    public function brand($id)
    {
        $goodsData = DB::table('goods')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('price.id', 'gname', 'gpic', 'workoff', 'price.price')
            ->orderBy('goods.addtime', 'desc')
            ->limit(12)
            ->where([['goods.status', '>', 0], ['brandid', '=', $id]])
            ->paginate(12);
        return $goodsData;
    }

    /**
     * 查询所有分类
     * @return array $type 类型
     */
     public function type()
     {
        $type = DB::table('home_category')
            ->leftJoin('brands', 'brands.categoryid', '=', 'home_category.id')
            ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
            ->select('home_category.id', 'home_category.name', DB::raw('COUNT(goods.id) as sum'))
            ->groupBy('home_category.id', 'home_category.name')
            ->get();
        return $type;
     }

     /**
      * 商品详细页
      * @author $id   商品的id
      * @return array $goodsDetail 指定id商品信息
      * @return array $goodsImg    商品的图片
      * @return array $goodsList   商品的其他版本
      */
      public function goodsDetail($id)
      {
          //查询指定id商品
          $goodsDetail = DB::table('goods')
              ->leftJoin('price', 'goods.id', '=', 'price.gid')
              ->select('goods.id', 'price.id as pid', 'gname', 'gpic', 'addtime', 'workoff', 'price.price', 'stock', 'ram', 'rom', 'color', 'attr')
              ->where('price.id', '=', $id)
              ->get()
              ->toArray();
          //查询此商品的其他版本
          $goodsList = DB::table('goods')
              ->leftJoin('price', 'goods.id', '=', 'price.gid')
              ->select('price.id', 'gname', 'ram', 'rom', 'color')
              ->where('goods.id', '=', $goodsDetail[0]->id)
              ->get()
              ->toArray();
          //查询此商品的图片
          $goodsImg = DB::table('goodsimg')
              ->select('gimg')
              ->where('gid', $goodsDetail[0]->id)
              ->get();
          return view('Home/goods/simple_product', [
              'goodsDetail' => $goodsDetail,
              'goodsImg' => $goodsImg,
              'goodsList' => $goodsList,
          ]);
      }
}
