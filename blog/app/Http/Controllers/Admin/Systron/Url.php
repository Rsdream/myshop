<?php

namespace App\Http\Controllers\Admin\Systron;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Qiniu\Auth;
use DB;
use Qiniu\Storage\UploadManager;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Admin\Api\ImageApi;
use App\Http\Controllers\Api\Common;

/**
 * @author [Dengjihua] <[<2563654031@qq.com>]>
 */

class Url extends Controller
{
    /**
     * 显示url的列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('url')
            ->select('id', 'name', 'logo', 'url', 'status')
            ->where('status', 0)
            ->paginate(6);
        // $user = AdminUser::where('status', 0)->paginate(6);
        
        return view('Admin/system-data', ['data' => $data]);
    }

    /**
     * url添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/add-url');
    }

    /**
     * 执行url的添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $url = $request->input('url');
        //允许上传的图片格式
        $allowExt = ['jpg', 'png', 'gif', 'jpeg'];
        if( !$request->hasFile('logo') ){

            return redirect('/admin/url/create')->with('errorTip', '请上传网站logo');
        }
        // 获取文件扩展名
        $extension = $request->logo->extension();
        //判断是否合法图片类型
        if (!in_array($extension, $allowExt)) {

            return redirect('/admin/url/create')->with('errorTip', '上传文件类型错误');
        }
        //获取文件临时路径
        $filePath = $request->logo->path();
        //生成文件名
        $fileName = rand(0, 1000).time();
        //处理图片
        $file = ImageApi::attrImg($filePath, 80, 40, $fileName.'_80_40.'.$extension);
        //上传到七牛云
        $ret = ImageApi::imgUp($filePath, $file);
        $data = ['url' => $url, 'name' => $name, 'logo' => $file];
        // dd($data);
        $results = DB::table('url')->insert($data);
        if ($results) {
            
            return redirect('admin/url')->with('msg', '添加成功');
        }

        return back()->with('添加失败');
        // dd($results);
    }

    /**
     * 接收传过来的参数，对url进行禁用或启用
     */
    public function show($id)
    {
        // var_dump($_GET);
        $data = $_GET['err'];
        $bool = DB::table('url')->where('id', $id)->update(['status' => $data]);
        if ($bool>0) {
            echo 1;
        }else{
            echo 2;
        }
    }

    //查看被禁的url
    public function disable()
    {
        $data = DB::table('url')->select('id', 'name', 'logo', 'url', 'status')->where('status', 1)->paginate(1);;

        return view('Admin/system-disable', ['data' => $data]);
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
