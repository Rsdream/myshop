<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Search;
use  App\Http\Controllers\Api\Common;

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
        $search = new search('shop');
        $goodsList = $search->doSearch($key);
        $pageRes = Common::CustomPagination($this->request, $goodsList, 12);
        // dd($pageRes);
        return view('Home/search', [
            'goodsData' => $pageRes,
        ]);
    }
}
