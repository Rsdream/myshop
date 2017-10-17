<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeUsers;
use Hash;
use Illuminate\Support\Facades\Redis;


class LoginController extends Controller
{

	public function login()
	{

		return view('Home/login/index');
	}

	/**
	 * @author kjw [kjwlaravel@163.com]
	 * [登录验证]
	 * @param  Request $request [description]
	 * @return [bool]           [错误判断，true:登录成功，false:返回登录页面]
	 */
	public function doLogin(Request $request)
	{
		//获取用户输入数据
		$name = $request->input('username');
		$pass = $request->input('userpass');
		//判断密码错误3次以上
		if(Redis::get('user:'.$name) == '3') {
			//等候10秒后再登录
			$request->session()->flash('erro', '密码错误次数过多，请在60秒后再次登录！');
			return back();
		}
		//查询数据库
		$user = HomeUsers::select(['id', 'pass', 'uid', 'name'])->where('uid',$name)->first();
		//判断密码
		if (Hash::check($pass, $user->pass)) {
			$request->session()->flush();
			$request->session()->put('user', $user->id);
			$request->session()->put('userinfo', [
				'id'   => $user->id,
				'uid'  => $user->uid,
				'name' => $user->name,
		        ]);
		    $request->session()->flash('login', '登录成功!');

			return back();
		} else {
			if (Redis::exists('user:'.$name)) {
				//错误次数加1
				Redis::incr('user:'.$name);
				Redis::expire('user:'.$name, '60');
			} else {
				//设置密码错误次数初始值
				Redis::set('user:'.$name, '1');
				Redis::expire('user:'.$name, '60');
			}
			$request->session()->flash('erro', '密码错误!');

			return back();
			}
	}

	//退出登录
	public function queit(Request $request)
	{
		//清空session用户数据
		$request->session()->pull('userinfo');
		$request->session()->pull('user');

		return redirect('/login');
	}
}
