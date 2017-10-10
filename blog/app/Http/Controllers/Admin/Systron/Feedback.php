<?php

namespace App\Http\Controllers\Admin\Systron;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Feedback extends Controller
{
    
    public function index()
    {

    	$data = DB::table('feedback')->select('id','name','contact','content','addtime')->paginate(6);
    	return view('Admin/feedback-list', ['data' => $data]);
    }
}
