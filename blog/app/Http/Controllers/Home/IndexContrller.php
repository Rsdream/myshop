<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeGoods;
use DB;
class IndexContrller extends Controller
{
    public function index()
    {
    	$category = DB::table('home_category')->select('id', 'name')->get()->toArray();
 
    	return view('index', ['good'=>$category]);
    }
}
