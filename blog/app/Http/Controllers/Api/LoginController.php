<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    
    public function signIn(LoginRequest $request)
    {
        //用户名
        $name = $request->input('uname');
        //密码
        $pass = $request->input('upass');
        //手机
        $phone = $request->input('uphone');
        //邮箱
        $email = $request->input('uemail');
    }
}
