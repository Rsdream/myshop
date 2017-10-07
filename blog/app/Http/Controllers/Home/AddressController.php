<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeDistrict;
use App\Model\Home\HomeAddress;
use DB;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
	//添加地址
    public function add(Request $request)
    {
        $name = $request->input('uname');
        $phone = $request->input('uphone');
        $address = $request->input('address');
        $pro = $request->input('pro');
        $city = $request->input('city');
        $area = $request->input('area');
        $uid = Session::get('user');

        HomeAddress::insert(['uid' => $uid, 'name' => $name, 'phone' => $phone, 'comment' => $address, 'city' => $city, 'area' => $area, 'pro' => $pro]);
        return back();
    }

    //查询地址
    public function show()
    {
    	$data = DB::table('orders_address')->select('id', 'name', 'phone', 'pro', 'city', 'area', 'comment')->where('uid', Session::get('user'))->orderBy('id', 'DESC')->get();
        $add = [];
    	foreach ($data as $v) {

    		$pro = HomeDistrict::select(['id', 'name'])->where('id', $v->pro)->first();
    		$city = HomeDistrict::select(['id', 'name'])->where('id', $v->city)->first();
    		$area = HomeDistrict::select(['id', 'name'])->where('id', $v->area)->first();

    		$add[] = [
    		'id' => $v->id,
    	    'pro' => $pro->name,
    	    'city' => $city->name,
    	    'area' => $area->name,
    	    'name' => $v->name,
    	    'phone' => $v->phone,
    	    'comment' => $v->comment,
    	    ];
    	}
     
    	echo json_encode($add);
    }

    public function del(Request $request)
    {
        $id = $request->input('id');
        DB::table('orders_address')->where('id', '=', $id)->delete();
    } 

    //三级联动
    public function select(Request $request)
    {
        $id = $request->input('upid');

        //接收分类ID
        $upid = intval($id);

        $data = HomeDistrict::select(['id', 'name', 'upid'])->where('upid', $upid)->get();

        echo json_encode($data);
        exit; 
    }
}
