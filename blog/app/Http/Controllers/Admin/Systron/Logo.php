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

class Logo extends Controller
{
    public function index()
    {

        $data = DB::table('logo')->select('id', 'name', 'logo')->get();

    	$sum = DB::table('logo')->select('id')->count();

    	return view('Admin/system-category', ['logo' => $data, 'sum' => $sum]);
    }

    //加载添加页面
    public function add()
    {

        return 1;
    }

    //执行添加
    public function insert()
    {

    }

    public function edit($id)
    {
    	$one = DB::table('logo')->select('id', 'name', 'logo')->where('id', $id)->first();

    	return view('Admin/system-update', ['one' => $one]);
    }

    public function update(Request $request)
    {

    	//接收传递过来的数据
    	$id = $_POST['id'];
    	$name = $_POST['name'];
    	//得到源图片
    	$oldLogo = DB::table('logo')->select('logo','id')->where('id', $id)->first();

    	//允许的图片格式
        $allowExt = ['jpg', 'png', 'gif', 'jpeg'];

        //判断是否有文件上传
        if ($request->hasFile('logo')) {

        	//获取文件扩展名
            $extension = $request->logo->extension();

            //判断类型是否合法
            if (!in_array($extension, $allowExt)) {
                redirect('/admin/logo')->with('errorTip', '上传文件类型错误');
                return '<script>parent.location.reload();</script>';
            }
            
            //获取文件临时路径
      		$filePath = $request->logo->path();

      		$fileName = time().'_logo.jpg';

      		//处理图片
      		$filePath = ImageApi::attrImg($filePath, 150, 60, $fileName);
      		//上传到七牛云
            $ret = ImageApi::imgUp($filePath, $fileName);

            $bool = DB::table('logo')->where('id', $id)->update([
            	'name' => $name,
            	'logo' => './upload/image/'.$fileName,
            ]);
            $image = true;
            //删除旧的logo图
            unlink($oldLogo->logo);
            //判断修改数据或图片是否成功
	        if ( $bool || !empty($image) ) {
	            redirect('/admin/logo');
	            return '<script>parent.location.reload();</script>';
	        }
        }else{
        	return back()->with('errorTip', '修改失败');
        }

    }
}
