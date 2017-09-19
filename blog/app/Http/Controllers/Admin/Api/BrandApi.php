<?php

namespace App\Http\Controllers\Admin\Api;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 品牌管理资源控制器
 *
 */
class BrandApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandList = DB::table('brands')->select('id', 'bname', 'categoryid', 'blogo', 'depict')->get();
        return view('Admin/product-brand', ['brandlist' => $brandList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brandInfo = DB::table('brands')->select('id', 'bname', 'depict', 'blogo', 'categoryid')->first();
        $typeList = DB::table('home_category')->select('id', 'name')->get()->toArray();
        return view('Admin/product-brand-edit', ['brandinfo' => $brandInfo, 'typelist' => $typeList]);
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
        $bName = $request->input('bname');
        $typeId = $request->input('typeid');
        $depict = $request->input('depict');

        $bool =DB::table('brands')->where('id', $id)->update(
            [
                'bname' => $bName,
                'categoryid' => $typeId,
                'depict' => $depict,
            ]
        );

        if ($bool) {
            echo '<script>alert("修改成功");parent.location.reload();</script>';
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
        //
    }
}
