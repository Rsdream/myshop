<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Search;
use  App\Http\Controllers\Api\Common;
use DB;

/**
 * 搜索商品控制器
 * @author rong <[<871513137@qq.com>]>
 *
 */
class SearchController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * 搜索数据
     *
     */
    public function search(Request $request)
    {
        //获取用户输入的关键字
        $key = $request->input('key');
        $min = $request->input('min_price');
        $max = $request->input('max_price');
        $search = new search('shop');
        $goodsList = $search->doSearch($key);
        $pageRes = Common::CustomPagination($this->request, $goodsList, 12);
        // dd($pageRes);
        $category = DB::table('home_category')
            ->leftJoin('brands', 'brands.categoryid', '=', 'home_category.id')
            ->leftJoin('goods', 'brands.id', '=', 'goods.brandid')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select('home_category.id', 'home_category.name', DB::raw('COUNT(goods.id) as sum'))
            ->where('goods.status', '>', 0)
            ->groupBy('home_category.id', 'home_category.name')
            ->get();
        $coverImg = DB::table('cover')->select('id', 'name', 'price')->get();
        if (!empty($min) && !empty($max)) {
            foreach($pageRes as $k=>$v) {
                if ($v['price'] < $min || $v['price'] > $max) {
                    unset($pageRes[$k]);
                }
            }
        }
        return view('Home/search', [
            'goodsData' => $pageRes,
            'category' => $category,
            'coverImg' => $coverImg,
            'key' => $key,
            'min' => $min,
            'max' => $max,
        ]);
    }
}
