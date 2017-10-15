<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeUsers;
use App\Http\Controllers\Api\CommonApi;
use Lixunguan\Yuntongxun\Sdk as Yuntongxun;


class ForgetController extends Controller
{
    /**
    * @author kjw <[kjwlaravel@163.com]>
    */
		//加载找回密码首页
		public function forget(Request $request)
		{

				return view('Home/login/forget');
		}

		//判断手机号是否存在
		public function handle(Request $request)
		{
		    //判断注册手機號名是否存在
		    //获取字段值
		    $uphone    = $request->input('uphone');
		    $userphone = HomeUsers::select(['id','phone'])->where('phone',$uphone)->first();//查询数据库
		    //手机号不存在
		    if(!$userphone) {

		      	return $this->json(1001,'手机号不存在');
		    }
		}

		//发送密码
		public function send(Request $request)
		{
			//获取用户输入数据
		    $phone = $request->input('uphone');
		    $pass  = $request->input('upass');
		    //手机验证码判断
		    $phonebool = CommonApi::checkPhoneCode($request, 'phonecode');
		    if (!$phonebool) {
		        $request->session()->flash('erro', '手机验证码错误!');

		        return back();
		    }
		    //修改密码
		    $bool = HomeUsers::where('phone', '=', $phone)->update(['pass' => bcrypt($pass)]);
		    if ($bool) {
		    	$request->session()->flash('success', '修改密码成功! 请重新登陆');

		    		return redirect('/login');
		    } else {
		    	$request->session()->flash('erro', '修改密码失败!');

		    		return back();
		    }
		}

    //返回值封装
    public function json($code = '', $msg= '', $data = [])
        {
        return response()->json([
          'status' => $code,
          'msg'    => $msg,
          'data'   => $data,
        ]);
    }
}
