<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 *
 */
class IndexUserController extends Controller
{
    public function myAccount()
    {
        return view('Home/user/my_account');
    }

    /**
     * 个人信息
     */
    public function information()
    {
        $id = session('userinfo')['id'];

        $userInfo = DB::table('home_users')->select('uid', 'name', 'phone', 'email', 'sex', 'score', 'growth')
            ->where('id', $id)
            ->first();

        if ( $userInfo->growth >= 20000 ) {
            $userInfo->lv = '钻石会员';
        } else if ( $userInfo->growth >= 10000 ){
            $userInfo->lv = '会员';
        } else {
            $userInfo->lv = '普通会员';
        }
        return view('Home/user/information', ['userInfo' => $userInfo]);
    }

    //地址
    public function address()
    {
        $id = session('userinfo')['id'];
        $addressList = DB::table('address')->select('id', 'name', 'phone', 'province', 'district', 'city', 'detail')->where('uid', $id)->get();
        return view('Home/user/address', ['addressList' => $addressList]);
    }
    //添加地址
    public function add()
    {
        $region = DB::table('region')->select('REGION_NAME', 'REGION_ID')->where('PARENT_ID', '1')->get();
        return view('Home/user/add', ['region' => $region]);
    }

    //编辑地址
    public function edit(Request $request, $id)
    {

        $region = DB::table('region')->select('REGION_NAME', 'REGION_ID')->where('PARENT_ID', '1')->get();
        $address = DB::table('address')->select('id', 'name', 'phone', 'province', 'district', 'city', 'detail')->where('id', $id)->first();
        return view('Home/user/edit', ['address' => $address, 'region' => $region]);
    }

    /**
     * 修改用户信息
     */
     public function infoUpdate(Request $request)
     {
        $id = session('userinfo')['id'];
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $sex = $request->input('sex');
        if (!$name || !$sex || !$email || !$phone || !$sex)
        {
            return back();
        }
        $userInfo = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'sex' => $sex,
        ];
       $bool = DB::table('home_users')->where('id', $id)->update($userInfo);
       if ($bool) {
           $request->session()->flash('msg', '修改成功!');
           return redirect('/user/information');
       } else {
           $request->session()->flash('msg', '未做修改!');
           return redirect('/user/information');
       }
     }
}
