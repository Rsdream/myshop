<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeUsers;
use App\Http\Controllers\Api\CommonApi;
use DB;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{

	
    /**
     * @author kjw <[kjwlaravel@163.com]>
     * 判断注册用户名，手机号是否已存在和登录时判断用户名是否存在
     * @param  Request $request [description]
     * @return boolean          [true已存在，false:不存在；]
     */
    public function isExistence(Request $request)
    {
        //判断注册用户名是否存在
        //获取字段值
        $uname = $request->input('uname');
        //查询数据库
        $user = HomeUsers::select(['id','uid'])->where('uid',$uname)->first();
        //用户名不存在
        if($user) {

          return $this->json(1000,'用户名已存在');
        }         
        //判断注册手機號名是否存在
        //获取字段值
        $uphone = $request->input('uphone');
        //查询数据库
        $userphone = HomeUsers::select(['id','phone'])->where('phone',$uphone)->first();
        //手机号不存在
        if($userphone) {

          return $this->json(1001,'手机号已存在');
        }         
        //登錄判斷用戶名是否存在
        //获取字段值
        $name = $request->input('username');
        //查询数据库
        $username = HomeUsers::select(['id','uid'])->where('uid',$name)->first();
        //登录用户名不存在
        if(!$username) {

          return $this->json(1002,'用戶名不存在');
        } 
    }

    /**
     * 注册
     * @param  RegisterRequest $request [正则]
     * @return [type]                   [true:验证通过；flase：验证失败]
     */
    public function doRegister(RegisterRequest $request)
    {
        //获取用户注册输入数据
        $uname     = $request->input('uname'); 
        $upass     = $request->input('upass'); 
        $uphone    = $request->input('uphone'); 
        $ucode     = $request->input('ucode'); 
        $phonecode = $request->input('phonecode');
        $time      = time();//注册时间
        //验证码判断
        $bool = CommonApi::checkCode($request, 'ucode');
        //验证码有误
        if (!$bool) {
            $request->session()->flash('erro', '验证码错误!');

            return back();
        }
        //手机验证码判断
        $phonebool = CommonApi::checkPhoneCode($request, 'phonecode');
        if (!$phonebool) {
            $request->session()->flash('erro', '手机验证码错误!');

            return back();
        } else {
            //注册成功提交数据到数据库
            $user = DB::table('home_users')->insert([
                'uid'     => $uname,
                'pass'    => bcrypt($upass),
                'phone'   => $uphone,
                'addtime' => $time
            ]);
            if ($user) {
                $request->session()->flash('success', '注册成功!');

                return back();
            } else {
                //注册失败
                $request->session()->flash('success', '注册失败!');

                return back();
            }              
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
