<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Lixunguan\Yuntongxun\Sdk as Yuntongxun;



class CommonApi extends Controller
{

  //生成验证码
  public function buildCode(Request $request)
  {
    $builder = new CaptchaBuilder;
    $builder->build();

    //获取验证码内容
    $phrase = $builder->getPhrase();
    
    //将验证码存到session
     $request->session()->put('code', $phrase);
     \Session::save();

    //生成图片
    header("Cache-Control: no-cache, must-revalidate");
    header('Content-Type: image/jpeg');
    $builder->output();
    exit;
  }

  //验证码验证
  public  static function checkCode(Request $request, $formCodeName = 'code')
  {
      $userCode = $request->input($formCodeName);
      if ( $request->session()->get('code') == $userCode ) {
           
          return true;
      }
      return false;
  }


  //手机验证码
  public function phoneCode(Request $request)
  {

    $phone = $request->input('uphone');

    // APP ID 需要到具体应用中找
    $sdk = new Yuntongxun('8a216da85e7e4bbd015e883ea62c0458', '8a216da85e7e4bbd015e883ea48f0451', '952caf1b769b44f8a0e928fb5a3c11da');
    
    //随机数
    $num = rand(1111,9999);

    //将随机数存到session
     $request->session()->put('phonecode', $num);
     \Session::save();

    //验证码有效时间（分钟）
    $time = 1;

    // 1是短信模板， phone为手机号, 第二个参数为发送的短信验证码
    $sms = $sdk->sendTemplateSMS($phone, array($num,$time), 1);
    
    if($sms->statusMsg != ''){ 
        return $this->json(1200, $sms->statusMsg);
    }
  }


  //手机验证码验证
  public  static function checkPhoneCode(Request $request, $formPhoneCodeName = 'phonecode')
  {
      $userPhoneCode = $request->input($formPhoneCodeName);
      if ( $request->session()->get('phonecode') == $userPhoneCode ) {
           
          return true;
      }
      return false;
  }
  
  //返回值
  public function json($code, $msg, $data = [])
  {
    return response()->json([
      'status' => $code,
      'msg'    => $msg,
      'data'  => $data,
    ]);
  }

}