<?php

namespace App\Http\Controllers\Admin\Systron;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * @author [Dengjihua] <[<2563654031@qq.com>]>
 */
class Feedback extends Controller
{
    
    /**
     * 友情链接的列表
     * @return [array $data] [友情链接的数据]
     */
    public function index()
    {

    	$data = DB::table('feedback')->select('id','name','contact','content','addtime')->paginate(6);
    	return view('Admin/feedback-list', ['data' => $data]);
    }
}
