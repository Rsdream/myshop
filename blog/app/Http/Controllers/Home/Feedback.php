<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Feedback extends Controller
{
    public function index()
    {

    	//先判断是否登录
    	

    	return view('Home/feedback');
    }

    public function insert(Request $request)
    {

    	$data = DB::table('feedback')->insert([

    		'uid' => $request->input('uid'),
    		'contact' => $request->input('contact'),
    		'name' => $request->input('name'),
    		'content' => $request->input('content'),
    		'addtime' => time()
    	]);

    	if ($data > 0) {
    		return redirect('/')->with('msg', '反馈成功');
    	}
    }
}
