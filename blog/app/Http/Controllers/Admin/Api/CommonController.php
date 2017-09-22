<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;

class CommonController extends Controller
{
    public function buildCode (Request $request)
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        //获取验证码内容
        $phrase = $builder->getPhrase();
        //将验证码存到session
        $request->session()->flash('code', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        // exit;
    }
//验证验证码是否正确
    public static function CheckCode (Request $request, $formCodeName = 'code')
    {
        $userCode = $request->input($formCodeName);
        if ( session('code') == $userCode ) {
        	return	true;
        }
        	return false;		
    }


    public function Out(Request $request)
    {
        $request->session()->forget('admin_users');
        return view('Admin/login');
    }
}
