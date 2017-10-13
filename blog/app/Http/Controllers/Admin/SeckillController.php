<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * 秒杀商品
 * @author rong <[<871513137@qq.com>]>
 */
class SeckillController extends Controller
{
    /**
     * 秒杀商品的列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询所有商品
        $goodsList = DB::table('goods')
            ->leftJoin('goodsdetail', 'goods.id', '=', 'goodsdetail.gid')
            ->leftJoin('price', 'goods.id', '=', 'price.gid')
            ->select(
                'price.id',
                'gname',
                'gpic',
                'brandid',
                'addtime',
                'goods.price',
                'ram',
                'rom',
                'status',
                'workoff',
                'goodsdetail.gdetail'
            )
            ->where('price.attr', 2)
            ->get()
            ->toArray();
        //查询所有品牌
        $brandList = DB::table('brands')
            ->pluck('bname', 'id')
            ->toArray();
        //商品列表视图
        return view('Admin/seckill-list',
            [
                'goodsList' => $goodsList,
                'brandList' => $brandList,
            ]
        );
    }

    /**
     * 添加秒杀
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询所有商品
        $goodsList = DB::table('goods')
            ->leftJoin('goodsdetail', 'goods.id', '=', 'goodsdetail.gid')
            ->rightJoin('price', 'goods.id', '=', 'price.gid')
            ->select(
                'price.id',
                'gname',
                'gpic',
                'brandid',
                'status',
                'workoff',
                'price.price',
                'ram',
                'rom',
                'goodsdetail.gdetail',
                'price.attr'
            )
            ->where('price.attr', '=', null)
            ->get()
            ->toArray();
        //查询所有品牌
        $brandList = DB::table('brands')
            ->pluck('bname', 'id')
            ->toArray();
        //商品列表视图
        return view('Admin/seckill-add',
            [
                'goodsList' => $goodsList,
                'brandList' => $brandList,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::table('price')->where('id', $id)->update(['attr' => 2]);
        redirect('/admin/seckill')->with('msg', '添加秒杀成功');
        return '<script>parent.location.reload();</script>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
