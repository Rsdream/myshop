<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeUsers;
use App\Http\Requests\LoginRequest;
use Hash;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{

		public function login()
		{
				return view('Home/login/index');
		}
		/**
		 * 登录判断
		 * @author kjw <[kjwlaravel@163.com]>
		 * @param  LoginRequest $request [正则判断]
		 * @return [string]                [把错误放在闪存中，回退同时把错误信息返回]
		 */
		public function doLogin(LoginRequest $request)
		{


			//获取用户输入数据
			$name = $request->input('username');
			$pass = $request->input('userpass');

			//判断密码错误3次以上
			if(Redis::get('user:'.$name) == 3) {

					//等候10秒后再登录
					Redis::expire('user:'.$name, '10');
					$request->session()->flash('erro', '密码错误3次！请在10秒后再登录');
					return back();
			}

			//查询数据库
			$user = Home_users::select(['id', 'pass', 'uid', 'name'])->where('uid',$name)->first();

			//判断密码
			if (Hash::check($pass, $user->pass)) {
					$request->session()->flush();
					$request->session()->put('userinfo', [
							'id' => $user->id,
							'uid' => $user->uid,
							'name' => $user->name,
					]);
					$request->session()->flash('success', '登录成功!');
					return back();
			} else {

					if (Redis::exists('user:'.$name)) {

							//错误次数加1
							Redis::incr('user:'.$name);
					} else {

							//设置密码错误次数初始值
							Redis::set('user:'.$name, '1');
					}

					$request->session()->flash('erro', '密码错误!');
					return back();
			}
		}
		public function queit(Request $request)
		{
				$request->session()->pull('userinfo');
				return redirect('/login');
		}
		public function outLogin()
		{		session()->flush();
			return redirect('/');
		}
}
