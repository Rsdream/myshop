<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * @author [Dengjihua] <[<2563654031@qq.com>]>
 */
class Feedback extends Controller
{
    public function index(Request $request)
    {
      	if (!$request->session()->get('userinfo')) {

              return redirect('/login');
          }

      	return view('Home/feedback');
    }

    public function insert(Request $request)
    {
        $user = $request->session()->get("userinfo");
        //根据用户限制他1小时只能反馈1条
        //查出最近的1条

        $num = DB::table('feedback')
            ->select('addtime')
            ->where('uid', $user['id'])
            ->orderBy('addtime', 'desc')
            ->first();
        if ($num) {
            if (time() - $num->addtime < 60*60) {
                return redirect('/')->with('err', '不能频繁反馈！');
            }
        }

        $this->validate($request, [
            'contact' => 'bail|required|',
            'name' => 'required',
            'content' => 'required',
        ],[

            'name.required' => '称呼不能为空',
            'contact.required' => '联系方式不能为空',
            'content.required' => '反馈信息不能为空',
        ]);

      	$data = DB::table('feedback')->insert([

        		'uid' => $user['id'],
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
