<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 后台商品管理控制类
 * @author rong <[<871513137@qq.com>]>
 *
 */
class ProductController extends Controller
{
    //产品分类管理
    public function category()
    {
        return view('Admin/product-category');
    }

    //添加产品分类
    public function categoryAdd()
    {
        return view('Admin/product-category-add');
    }

    //产品列表
    public function list()
    {
        return view('Admin/product-list');
    }
}
