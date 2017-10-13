<?php

namespace App\Http\Controllers\Admin\Api;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Api\CommonController;
use App\Model\Admin\AdminUser;

class LoginController extends Controller
{
    public function dologin(AdminLoginRequest $request)
    {
        $name = $request->input("name");
        $pass = $request->input('pass');
        $code = $request->input("code");
        // 验证验证码是否正确
        $bool = CommonController::CheckCode($request, 'code');
        if (!$bool) {
            return $this->json(1404, '验证码错误');
        }

        // 查询数据库				
        $users = DB::table('admin_users')->select('id','uid','name','pass','phone','status')->where('uid',"$name")->first();

        if (!$users) {
            return $this->json(1400,"登陆失败,用户名不存在",$users);
        } elseif ($pass != $users->pass) {
            return $this->json(1401,'登陆失败,密码错误');

        } else {
            $user = AdminUser::find($users->id);

            // if ($user->roles) {
                $arr = [];
                $permission = [];
                foreach ($user->roles as $v) {

                    $arr[] = $v->name;
                    $permission[] = $v;
                }
                $users->role = $arr;
                $users->permission = $permission;
            // }

            
            $user_information = $users;  		

            $request->session()->pull('admin_users',$user_information);
            $request->session()->push( 'admin_users',$user_information);
            return $this->json(1200,"登陆成功",session('admin_users'));
        }
    }
    public function json($code, $msg, $data = [])
    {
        return response()->json([
        'status' => $code,
        'msg'    => $msg,
        'data'  => $data,
        ]);
    }
}
