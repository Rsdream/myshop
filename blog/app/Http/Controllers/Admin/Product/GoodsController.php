<?php

namespace App\Http\Controllers\Admin\Product;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Admin\Api\ImageApi;
use App\Http\Controllers\Api\Search;
use  App\Http\Controllers\Api\Common;

/**
 * 商品管理资源控制器
 * @author rong <[<871513137@qq.com>]>
 *
 */
class GoodsController extends Controller
{
    /**
     * 商品列表视图
     *
     * @return $goodsList 商品列表 $brandlist 品牌列表
     */
    public function index()
    {
        //查询所有商品
        $goodsList = DB::table('goods')
            ->leftJoin('goodsdetail', 'goods.id', '=', 'goodsdetail.gid')
            ->select(
                'goods.id',
                'gname',
                'gpic',
                'brandid',
                'addtime',
                'status',
                'workoff',
                'goodsdetail.gdetail'
            )
            ->get()
            ->toArray();
        //查询所有品牌
        $brandList = DB::table('brands')
            ->pluck('bname', 'id')
            ->toArray();
        //商品列表视图
        return view('Admin/product-list',
            [
                'goodsList' => $goodsList,
                'brandList' => $brandList,
            ]
        );
    }

    /**
     * 加载添加商品视图
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询所有分类
        $categoryList = DB::table('home_category')
            ->select('id', 'name')
            ->get()
            ->toArray();
        //查询默认加载品牌
        $brandList = DB::table('brands')
            ->where('categoryid', $categoryList[0]->id)
            ->pluck('bname', 'id')
            ->toArray();
        //加载添加商品视图
        return view('Admin/product-add',
            [
                'categoryList' => $categoryList,
                'brandList' => $brandList,
            ]
        );
    }

    /**
     * 添加商品、添加商品到迅搜
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //输入配置的数量
        $sum = $request->input('sum');
        $detail = $request->input('detail');
        //允许的图片格式
        $allowExt = ['jpg', 'png', 'gif', 'jpeg'];
        //判断是否有图片上传
        if( !$request->hasFile('img') ){
            return redirect('/admin/product/goods/create')->with('errorTip', '请选择商品主图');
        }
        //获取文件扩展名
        $extension = $request->img->extension();
        //判断是否合法图片类型
        if (!in_array($extension, $allowExt)) {

            return redirect('/admin/product/goods/create')->with('errorTip', '上传文件类型错误');
        }
        //获取文件临时路径
        $filePath = $request->img->path();
        //生成文件名
        $fileName = rand(0, 1000).time();
        //处理图片
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 150, 150, $fileName.'_150_150.'.$extension), './');
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 180, 180, $fileName.'_180_180.'.$extension), './');
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 300, 300, $fileName.'_300_300.'.$extension), './');
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 600, 600, $fileName.'_600_600.'.$extension), './');
        //json图片名数组
        $gpicJson = json_encode($filePathArr);
        //商品的数据
        $goods = [
            'gname' => $request->input('gname'),
            'brandid' => $request->input('brand'),
            'gpic' => $gpicJson,
            'addtime' => time(),
            'price' => $request->input('price1'),
        ];
        $goodsId = DB::table('goods')->insertGetId($goods);
        //根据数量添加商品配置和价格
        for ($i = 1; $i<=$sum; $i++) {
            $arr = [
                'gid' => $goodsId,
                'stock' => $request->input('stock'.$i),
                'price' => $request->input('price'.$i),
                'ram' => $request->input('ram'.$i),
                'rom' => $request->input('rom'.$i),
                'color' => $request->input('color'.$i),
            ];
            DB::table('price')->insert($arr);
        }
        //添加商品描述
        DB::table('goodsdetail')->insert(['gid' => $goodsId, 'gdetail' => $detail]);
        //new 迅搜对象
        $search = new Search('shop');
        //搜索数据

        $searchArr = [
            'gname' => $request->input('gname'),
            'id' => $goodsId,
            'brand' => $request->input('brand'),
            'gpic' => $filePathArr['2'],
            'price' => $request->input('price1'),

        ];
        //添加搜索商品数据到迅搜
        $search->addDocumentData($searchArr);
        redirect('/admin/product/goods')->with('msg', '添加商品成功');
        return '<script>parent.location.reload();</script>';
    }

    /**
     * 编辑商品
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //查询所有分类
      $categoryList = DB::table('home_category')
          ->select('id', 'name')
          ->get()
          ->toArray();
      //查询被编辑的商品
      $goodsData = DB::table('goods')
          ->leftJoin('price', 'goods.id', '=', 'price.gid')
          ->select('goods.id', 'brandid', 'gpic', 'gname', 'ram', 'rom', 'color', 'goods.price', 'stock')
          ->where('goods.id', $id)
          ->get()
          ->toArray();
      //查询商品的品牌与类别
      $goodsBrand = DB::table('brands')
          ->leftJoin('home_category', 'brands.categoryid', '=', 'home_category.id')
          ->select('home_category.id', 'brands.id as bid')
          ->where('brands.id', '=', $goodsData[0]->brandid)
          ->first();
      //查询默认加载品牌
      $brandList = DB::table('brands')
          ->where('categoryid', $goodsBrand->id)
          ->pluck('bname', 'id')
          ->toArray();
      //查询商品的详情
      $detail = DB::table('goodsdetail')
          ->select('gdetail')
          ->where('goodsdetail.gid', $id)
          ->first();

      //加载编辑商品视图
      return view('Admin/product-edit',
          [
              'categoryList' => $categoryList,
              'brandList' => $brandList,
              'goodsData' => $goodsData,
              'detail' => $detail,
              'goodsBrand' => $goodsBrand,
          ]
      );
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

    /**
     * 加载选择品牌
     *
     * @param  int  $id 分类id
     * @return array $brandsList 品牌列表
     */
    public function goodsBrand(Request $request)
    {
        //根据分类id查询当前类别的品牌
        $id = $request->input('categoryid');
        $brandsList = DB::table('brands')->select('bname', 'id')->where('categoryid', $id)->get();
        //
        return $brandsList;
    }

    /**
     * 执行商品图片的上传
     *
     * @return
     */
    public function goodsImg(Request $request, $id)
    {
        //允许的图片格式
        $allowExt = ['jpg', 'png', 'gif', 'jpeg'];
        //判断是否有图片上传
        if( !$request->hasFile('file') ){
            return redirect('/admin/product/goods/create')->with('errorTip', '没有图片被上传');
        }
        //获取文件扩展名
        $extension = $request->file->extension();
        //判断是否合法图片类型
        if (!in_array($extension, $allowExt)) {

            return redirect('/admin/product/goods/create')->with('errorTip', '上传文件类型错误');
        }
        //获取文件临时路径
        $filePath = $request->file->path();
        //生成文件名
        $fileName = time().rand(11, 99);
        //上传到七牛云
        $ret = ImageApi::imgUp($filePath, $fileName.'.'.$extension);
        //处理图片
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 150, 150, $fileName.'_150_150.'.$extension), './');
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 180, 180, $fileName.'_180_180.'.$extension), './');
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 300, 300, $fileName.'_300_300.'.$extension), './');
        $filePathArr [] = trim(ImageApi::attrImg($filePath, 600, 600, $fileName.'_600_600.'.$extension), './');
        //json图片名数组
        $gpicJson = json_encode($filePathArr);
        //商品的数据
        $picData = [
            'gid' => $id,
            'gimg' => $gpicJson,
        ];
        $goodsId = DB::table('goodsimg')->insertGetId($picData);
        return $goodsId;
    }

    /**
     * 执行商品上架、下架
     * @return bool 真假
     */
    public function stopAndStart(Request $request)
    {
        //获取要修改的用户id、和状态
        $goodsId = $request->input('id');
        $goodsStatus = $request->input('status')==1?0:1;
        //执行修改
        $bool = DB::table('goods')
            ->where('id', $goodsId)
            ->update(['status' => $goodsStatus] );
        return $bool;
    }
}
