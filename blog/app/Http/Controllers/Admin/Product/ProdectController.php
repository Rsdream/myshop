<?php

namespace App\Http\Controllers\Admin\Product;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 产品分类处理类
 * @author rong <[<871513137@qq.com>]>
 *
 */
class ProdectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //分类列表页
        $typeList = DB::table('home_category')->select('id','name')->get()->toArray();
        return view('Admin/product-category', ['typelist' => $typeList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加页面视图
        return view('Admin/product-category-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeName = $request->input('typename');
        if ($typeName == 'undefined' || !$typeName) {
            return 0;
        }
        $bool = DB::table('home_category')->insert(['name' => $typeName, 'addtime' => time()]);
        if (!$bool) {
            redirect('/admin/product/category')->with('errorTip', '添加失败');
        }
        redirect('/admin/product/category')->with('msg', '添加成功!');
        return '<script>parent.location.reload();</script>';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeInfo = DB::table('home_category')->select('id' ,'name')->where('id', $id)->first();

        return view('Admin/product-category-update', ['typeinfo' => $typeInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //修改分类
        $typeName = $request->input('product-category-name');
        $bool = DB::table('home_category')->where('id', $id)->update(['name' => $typeName]);
        if ($bool) {
            redirect('/admin/product/category')->with('msg', '修改成功');
            return '<script>parent.location.reload();</script>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除分类
        if (empty($id)) {
            return false;
        }

        $bool =  DB::table('home_category')->where('id', $id)->delete();

        if ($bool) {
            redirect('/admin/product/category')->with('msg', '删除成功');
            return '<script>parent.location.reload();</script>';
        }
    }
}
