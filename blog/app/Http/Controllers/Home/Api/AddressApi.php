<?php

namespace App\Http\Controllers\Home\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * 处理地址的增、删、改
 * @author rong <[871513137@qq.com]>
 */
class AddressApi extends Controller
{
    /**
     * 执行添加
     */
    public function exAdd(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $province = $request->input('province');
        $city = $request->input('city');
        $district = $request->input('district');
        $detail = $request->input('detail');
        $id = session('userinfo')['id'];
        if (!$name || !$phone || !$province || !$city || !$district || !$detail){
            return back();
        }
        $addressInfo = [
            'name' => $name,
            'phone' => $phone,
            'province' => $province,
            'city' => $city,
            'district' => $district,
            'detail' => $detail,
            'uid' => $id,
        ];
        DB::table('address')->insert($addressInfo);
        $request->session()->flash('msg', '添加成功!');
        return redirect('/user/address');
    }

    /**
     * 获取城市地址
     */
    public function select(Request $request)
    {
        $id = $request->input('id');
        $region = DB::table('region')->select('REGION_NAME', 'REGION_ID')->where('PARENT_ID', $id)->get();
        return $region;
    }

    /**
     * 执行修改收货地址
     */
     public function exEdit(Request $request, $id)
     {
       $name = $request->input('name');
       $phone = $request->input('phone');
       $province = $request->input('province');
       $city = $request->input('city');
       $district = $request->input('district');
       $detail = $request->input('detail');
       if (!$name || !$phone || !$province || !$city || !$district || !$detail){
           return back();
       }
       $addressInfo = [
           'name' => $name,
           'phone' => $phone,
           'province' => $province,
           'city' => $city,
           'district' => $district,
           'detail' => $detail,
       ];
       DB::table('address')->where('id', $id)->update($addressInfo);
       $request->session()->flash('msg', '修改成功!');
       return redirect('/user/address');
     }

     /**
      * 执行删除收货地址
      */
      public function delete(Request $request, $id)
      {
          DB::table('address')->where('id', $id)->delete();
          $request->session()->flash('msg', '删除成功!');
          return redirect('/user/address');
      }
}
