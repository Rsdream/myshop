<?php

namespace App\Http\Controllers\Admin\Api;

use DB;
use Qiniu\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Qiniu\Storage\UploadManager;
use Intervention\Image\ImageManager;

/**
 * 品牌管理资源控制器
 * @author rong <[<871513137@qq.com>]>
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
        $brandList = DB::table('brands')
            ->select('id', 'bname', 'categoryid', 'blogo', 'depict')
            ->get()
            ->toArray();

        $typeList = DB::table('home_category')->pluck('name', 'id')->toArray();
        return view('Admin/product-brand',
            [
                'brandlist' => $brandList,
                'typelist' => $typeList,
            ]
        );
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
      $bName = $request->input('bname');
      $categoryId = $request->input('categoryid');
      $depict = $request->input('depict');

      //允许的图片格式
      $allowExt = ['jpg', 'png', 'gif', 'jpeg'];
      //判断 品牌名、品牌类别、描述是否为空 空返回修改失败，并刷新页面
      if ( !$bName || !$categoryId || !$depict || !$request->hasFile('blogo')) {
          return '<script>alert("添加失败");window.history.back(-1);</script>';
      }

      //获取文件扩展名
      $extension = $request->blogo->extension();
      //判断是否合法图片类型
      if (!in_array($extension, $allowExt)) {
          return '上传文件类型错误';
      }
      //获取文件临时路径
      $filePath = $request->blogo->path();
      //保存图片，赋值文件名
      // $fileName = $request->logo->store('image');
      $fileName = time().'_logo.jpg';
      //处理图片
      $filePath = $this->attrImg($filePath, 180, 60, $fileName);
      //上传到七牛云
      $ret = $this->logoUp($filePath, $fileName);
      //上传成功的状态
      $bool =DB::table('brands')->insert(
          [
              'bname' => $bName,
              'categoryid' => $categoryId,
              'depict' => $depict,
              'blogo' => $fileName,
          ]
      );
      //判断添加数据或图片是否成功
      if ( $bool ) {
          return '<script>alert("添加成功");window.location.href="'.url('admin/product/brand').'";;</script>';
      } else {
          return '<script>parent.location.reload();</script>';
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brandInfo = DB::table('brands')
            ->where('id', $id)
            ->select('id', 'bname', 'depict', 'blogo', 'categoryid')
            ->first();
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
     * @return string
     */
    public function update(Request $request, $id)
    {
        //获取
        $bName = $request->input('bname');
        $typeId = $request->input('typeid');
        $depict = $request->input('depict');
        $wornFileName = $request->input('filename');
        //允许的图片格式
        $allowExt = ['jpg', 'png', 'gif', 'jpeg'];
        //判断 品牌名、品牌类别、描述是否为空 空返回修改失败，并刷新页面
        if ( !$bName || !$typeId || !$depict) {
            return '<script>alert("修改失败");parent.location.reload();</script>';
        }
        //判断是否有上传文件
        if ($request->hasFile('logo')) {
            //获取文件扩展名
            $extension = $request->logo->extension();
            //判断是否合法图片类型
            if (!in_array($extension, $allowExt)) {
                return '上传文件类型错误';
            }
            //获取文件临时路径
            $filePath = $request->logo->path();
            //保存图片，赋值文件名
            // $fileName = $request->logo->store('image');
            $fileName = time().'_logo.jpg';
            //处理图片
            $filePath = $this->attrImg($filePath, 180, 60, $fileName);
            //上传到七牛云
            $ret = $this->logoUp($filePath, $fileName);
            //上传成功的状态
            $bool =DB::table('brands')->where('id', $id)->update(
                [
                    'bname' => $bName,
                    'categoryid' => $typeId,
                    'depict' => $depict,
                    'blogo' => $fileName,
                ]
            );
            $image = true;
            //删除旧的logo图
            unlink('./upload/image/'.$wornFileName);
        } else {
            $bool =DB::table('brands')->where('id', $id)->update(
                [
                    'bname' => $bName,
                    'categoryid' => $typeId,
                    'depict' => $depict,
                ]
            );
        }
        //判断修改数据或图片是否成功
        if ( $bool || !empty($image) ) {
            return '<script>alert("修改成功");parent.location.reload();</script>';
        } else {
            return '<script>parent.location.reload();</script>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $fileName = DB::table('brands')
            ->select('blogo')
            ->where('id', $id)
            ->first();
        $bool = DB::table('brands')->where('id', $id)->delete();
        if ($bool) {
            unlink('./upload/image/'.$fileName->blogo);
        }
        return $bool;
    }

    /**
     * 品牌logo上传到七牛云
     * @param  string $filePath 图片路径
     * @param  string $fileName 图片名字
     * @return string $ret 成功的状态 $err 错误的状态
     */
    public function logoUp($filePath, $fileNmae)
    {

        $bucket = 'images';
        $secretKey = 'A8vb3UPGRXXfh5hvcvHfBGLVcRUSRVDuY4RbOy1q';
        $accessKey = 'lWvvVGZpbDI85oxvvWcgJonVt3Py3rAL9zz0g5XV';
        $auth = new Auth($accessKey, $secretKey);

        $token = $auth->uploadToken($bucket);

        // 要上传文件的本地路径
        $filePath = $filePath;
        // 上传到七牛后保存的文件名
        $key = $fileNmae;
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);

        if ($err !== null) {
            return $err;
        } else {
            return $ret;
        }
    }

    /**
     * 处理图片方法
     * @param  string $filePath 图片路径
     * @param  string $width    图片的高
     * @param  string $height   图片的宽
     * @param  string $fileNmae 要保存的图片名
     * @return string 处理成功返回图片的路径
     */
    public function attrImg($filePath, $width, $height, $fileName)
    {
        $manager = new ImageManager(array('driver' => 'imagick'));

        $image = $manager->make($filePath)->resize($width, $height);

        $filePath = './upload/image/'.$fileName;

        $bool = $image->save($filePath);

        if ($bool) {
            return $filePath;
        }
    }
}
