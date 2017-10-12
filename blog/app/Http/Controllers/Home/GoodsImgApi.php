<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * 商品大图
 * @author rong <[<871513137@qq.com>]>
 */
class GoodsImgApi extends Controller
{
    /**
     * 获取商品图
     * @author rong <[<871513137@qq.com>]>
     * @param  int   商品的id
     * @return array 商品图片页面
     */
    public function getImg(Request $request, $id)
    {
        $imgPath = DB::table('price')
            ->leftJoin('goods', 'price.gid', '=', 'goods.id')
            ->select('gpic')
            ->where('price.gid', $id)
            ->first();

        $imgPath = json_decode($imgPath->gpic, true)[3];
        return view('Home/img', ['src' => $imgPath]);
    }
}
