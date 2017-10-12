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
class Logo extends Controller
{
    //显示logo页
    public function index()
    {

        $data = DB::table('logo')->select('id', 'name', 'logo')->get();

    	$sum = DB::table('logo')->select('id')->count();

    	return view('Admin/system-category', ['logo' => $data, 'sum' => $sum]);
    }

    //加载添加页面
    public function add()
    {

        return view('Admin/add-logo');
    }

    //执行添加
    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
        ],[
            'name.required' => '网站名不能为空',
            'logo.required' => 'Logo不能为空',
        ]);
        $name = $request->input('name');
        $logo = $request->input('logo');
        //允许上传的图片格式
        $allowExt = ['jpg', 'png', 'gif', 'jpeg'];
        if( !$request->hasFile('logo') ){

            return redirect('/admin/logo/add')->with('errorTip', '请上传网站logo');
        }
        // 获取文件扩展名
        $extension = $request->logo->extension();
        //判断是否合法图片类型
        if (!in_array($extension, $allowExt)) {

            return redirect('/admin/logo/add')->with('errorTip', '上传文件类型错误');
        }
        //获取文件临时路径
        $filePath = $request->logo->path();
        //生成文件名
        $fileName = rand(0, 1000).time();
        //处理图片
        $file = ImageApi::attrImg($filePath, 80, 40, $fileName.'_80_40.'.$extension);
        //上传到七牛云
        $ret = ImageApi::imgUp($filePath, $file);
        $data = [ 'name' => $name, 'logo' => $file ];
        // dd($data);
        $results = DB::table('logo')->insert($data);
        if ($results) {
            
            return redirect('admin/logo')->with('msg', '添加成功');
        }

        return back()->with('err', '添加失败');
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
        	$bool = DB::table('logo')->where('id', $id)->update([
                'name' => $name,
            ]);
            if ($bool) {
                redirect('/admin/logo');
                return '<script>parent.location.reload();</script>';
            }
        }

    }
}
