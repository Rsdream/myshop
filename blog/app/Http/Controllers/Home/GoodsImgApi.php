<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsImgApi extends Controller
{
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
