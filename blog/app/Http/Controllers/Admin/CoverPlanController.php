<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\Admin\Api\ImageApi;
use Qiniu\Storage\UploadManager;
use Intervention\Image\ImageManager;
use Qiniu\Auth;

/**
 * 首页轮播图、添加、修改删除
 *  @author rong <[871513137@qq.com]>
 */
class CoverPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverImg = DB::table('cover')->select('id', 'name', 'price')->get();
        return view('Admin/coverplan', ['coverImg' => $coverImg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/coverplan-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //允许的图片格式
        $allowExt = ['jpg', 'png', 'gif', 'jpeg'];
        //判断是否有图片上传
        if( !$request->hasFile('file') ){
            return response('没有图片被上传', 404)->header('Content-Type', 'text/plain');
        }
        //获取文件扩展名
        $extension = $request->file->extension();
        //判断是否合法图片类型
        if (!in_array($extension, $allowExt)) {
            return response('上传文件类型错误', 404)->header('Content-Type', 'text/plain');
        }
        //获取文件临时路径
        $filePath = $request->file->path();
        //生成文件名
        $fileName = rand(0, 1000).time();
        //上传到七牛云
        ImageApi::imgUp($filePath, $fileName);
        //处理图片
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 400, 150, $fileName.'_400_150.'.$extension), './');
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 776, 351, $fileName.'_778_352.'.$extension), './');
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 1170, 452, $fileName.'_1170_352.'.$extension), './');
        //json图片名数组
        $gpicJson = json_encode($filePathArr);
        //商品的数据
        $coverData = [
            'name' => date('Y-m-d', time()),
            'price' => $gpicJson,
            'attr' => time(),
        ];
        $id = DB::table('cover')->insertGetId($coverData);
        return $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * 图片的删除
     */
    public function del($id)
    {
        $imgPath = DB::table('cover')->select('price')->where('id', $id)->first();
        $imgPath = json_decode($imgPath->price, true);
        foreach($imgPath as $v) {
            unlink('./'.$v);
        }
        DB::table('cover')->where('id', $id)->delete();
        return $id;
    }
}
