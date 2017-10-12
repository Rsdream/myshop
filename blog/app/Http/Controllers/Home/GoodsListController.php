<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cache;

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
        $this->min = $request->input('min_price');
        $this->max = $request->input('max_price');
        switch ($type) {
            case 'category':
                $goodsData = $this->category($id);
                // dd($goodsData);
                $brand = DB::table('brands')
                    ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
                    ->leftJoin('price', 'goods.id', '=', 'price.gid')
                    ->select('brands.id', 'blogo', 'bname', DB::raw('COUNT(goods.id) as sum'))
                    ->where([
                        ['categoryid', $id],
                        ['goods.status', '>', 0],
                    ])
                    ->groupBy('brands.id', 'blogo', 'bname')
                    ->get()
                    ->toArray();
                break;
            case 'brand':
                $goodsData = $this->brand($id);
                $categoryId = DB::table('brands')->select('categoryid')->where('id', $id)->first();
                $brand = DB::table('brands')
                    ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
                    ->leftJoin('price', 'goods.id', '=', 'price.gid')
                    ->select('brands.id', 'blogo', 'bname', DB::raw('COUNT(goods.id) as sum'))
                    ->where([
                        ['categoryid', $categoryId->categoryid],
                        ['goods.status', '>', 0],
                    ])
                    ->groupBy('brands.id', 'blogo', 'bname')
                    ->get()
                    ->toArray();
                break;
            default:
                return view('errors/404');
                break;
        }
        $coverImg = DB::table('cover')->select('id', 'name', 'price')->get();
        $category = $this->type();

        return view('Home/goods/shop', [
            'goodsData' => $goodsData,
            'category' => $category,
            'brand' => $brand,
            'coverImg' => $coverImg,
            'min' => $this->min,
            'max' => $this->max,
        ]);
    }

    /**
     * 以类别查询商品
     * @author $id   品牌的类别id
     * @return array $goodsData 商品数据
     */
    public function category($id)
    {
        $map[] = ['home_category.id', '=', $id];
        $map[] = ['goods.status', '>', 0];
        if ($this->min) {
            $map[] = ['price.price', '>=', $this->min];
        }
        if ($this->max) {
            $map[] = ['price.price', '<=', $this->max];
        }
        $goodsData = DB::table('home_category')
        ->leftJoin('brands', 'home_category.id', '=', 'brands.categoryid')
        ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
        ->leftJoin('price', 'goods.id', '=', 'price.gid')
        ->select('price.id', 'gname', 'gpic', 'workoff', 'price.price', 'ram', 'rom', 'color', 'gid')
        ->orderBy('goods.addtime', 'desc')
        ->limit(12)
        ->where($map)
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
        $map[] = ['brandid', '=', $id];
        $map[] = ['goods.status', '>', 0];
        if ($this->min) {
            $map[] = ['price.price', '>=', $this->min];
        }
        if ($this->max) {
            $map[] = ['price.price', '<=', $this->max];
        }
        $goodsData = DB::table('goods')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('price.id', 'gname', 'gpic', 'workoff', 'price.price', 'ram', 'rom', 'color', 'gid')
            ->orderBy('goods.addtime', 'desc')
            ->limit(12)
            ->where($map)
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
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('home_category.id', 'home_category.name', DB::raw('COUNT(goods.id) as sum'))
            ->where('goods.status', '>', 0)
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
        $workoff = DB::table('goods')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('workoff')
            ->where('price.id', '=', $id)
            ->first();
        if (empty($workoff)) {
            return view('errors/404');
        }
        if ($workoff->workoff >= 1000) {
            if ( Cache::has('goods:price:'.$id) ) {
                $goodsDetail = Cache::get('goods:price:'.$id);
                $goodsImg = Cache::get('goods:img:'.$id);
                $goodsList = Cache::get('goods:list:'.$id);
                $detail = Cache::get('goods:detail:'.$id);
            } else {
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
              //查询商品描述
              $detail = DB::table('goodsdetail')
                  ->select('gdetail')
                  ->where('gid', $goodsDetail[0]->id)
                  ->first();
              Cache::add('goods:price:'.$id, $goodsDetail, 1440);
              Cache::add('goods:img:'.$id, $goodsImg, 1440);
              Cache::add('goods:list:'.$id, $goodsList, 1440);
              Cache::add('goods:detail:'.$id, $detail, 1440);
            }
            return view('Home/goods/simple_product', [
                'goodsDetail' => $goodsDetail,
                'goodsImg' => $goodsImg,
                'goodsList' => $goodsList,
                'detail' => $detail,
            ]);
        }
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
        //查询商品描述
        $detail = DB::table('goodsdetail')
            ->select('gdetail')
            ->where('gid', $goodsDetail[0]->id)
            ->first();
        return view('Home/goods/simple_product', [
            'goodsDetail' => $goodsDetail,
            'goodsImg' => $goodsImg,
            'goodsList' => $goodsList,
            'detail' => $detail,
        ]);
    }

    /**
    * 商品详细页
    * @author $id   商品的id
    * @return array $goodsDetail 指定id商品信息
    * @return array $goodsImg    商品的图片
    * @return array $goodsList   商品的其他版本
    */
    public function goodsDetailTwo($id)
    {
        $workoff = DB::table('goods')
           ->leftJoin('price', 'goods.id', '=', 'price.gid')
           ->select('workoff', 'price.id')
           ->where('goods.id', '=', $id)
           ->first();
        if (empty($workoff)) {
           return view('errors/404');
        }
        $id = $workoff->id;
        if ($workoff->workoff >= 1000) {
            if ( Cache::has('goods:price:'.$id) ) {
               $goodsDetail = Cache::get('goods:price:'.$id);
               $goodsImg = Cache::get('goods:img:'.$id);
               $goodsList = Cache::get('goods:list:'.$id);
               $detail = Cache::get('goods:detail:'.$id);
            } else {
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
               //查询商品描述
               $detail = DB::table('goodsdetail')
                   ->select('gdetail')
                   ->where('gid', $goodsDetail[0]->id)
                   ->first();
               Cache::add('goods:price:'.$id, $goodsDetail, 1440);
               Cache::add('goods:img:'.$id, $goodsImg, 1440);
               Cache::add('goods:list:'.$id, $goodsList, 1440);
               Cache::add('goods:detail:'.$id, $detail, 1440);
            }
            return view('Home/goods/simple_product', [
               'goodsDetail' => $goodsDetail,
               'goodsImg' => $goodsImg,
               'goodsList' => $goodsList,
               'detail' => $detail,
            ]);
        }
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
        //查询商品描述
        $detail = DB::table('goodsdetail')
           ->select('gdetail')
           ->where('gid', $goodsDetail[0]->id)
           ->first();
        return view('Home/goods/simple_product', [
           'goodsDetail' => $goodsDetail,
           'goodsImg' => $goodsImg,
           'goodsList' => $goodsList,
           'detail' => $detail,
        ]);
    }

    /**
    * 商品的评论
    * @author $id   商品的id
    * @return array $goodsDetail 指定id商品信息
    */
    public function getGoodsComment($id) {
        $commentInfo = DB::table('orders_comment as c')
            ->leftJoin('price as p', 'c.gid', '=', 'p.id')
            ->leftJoin('home_users as u', 'u.id', '=', 'c.uid')
            ->select(
                'c.comment',
                'c.addtime',
                'p.ram',
                'p.rom',
                'p.color',
                'u.name',
                'u.uid',
                'c.text'
            )
            ->where('p.gid', $id)
            ->get();
        return $commentInfo;
    }

    /**
     * 评论的分页
     */
     public function commentPage($id) {
         $commentPage = DB::table('orders_comment as c')
             ->leftJoin('price as p', 'c.gid', '=', 'p.id')
             ->leftJoin('home_users as u', 'u.id', '=', 'c.uid')
             ->select(
                 'c.id'
             )
             ->where('p.gid', $id)
             ->paginate(1);
        return $commentPage->links();
     }
}
