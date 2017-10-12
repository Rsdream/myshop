<?php

namespace App\Http\Controllers\Admin\Systron;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * @author [Dengjihua] <[<2563654031@qq.com>]>
 */
class Feedback extends Controller
{
    
    /**
     * 友情链接的列表
     * @return [array $data] [友情链接的数据]
     */
    public function index()
    {

    	$data = DB::table('feedback')
            ->select('id', 'uid', 'name','contact','content','addtime')
            ->orderBy('addtime', 'desc')
            ->paginate(6);
    	foreach ($data as $v) {
    		$userinfo = $v;
    	}
    	$user = DB::table('home_users')->select('uid')->where('id', $userinfo->uid)->first();

    	return view('Admin/feedback-list', ['data' => $data, 'user' => $user]);
    }

    public function delete(Request $request, $id)
    {
        $bool = DB::table('feedback')->where('id', $id)->delete();

        if ($bool > 0) {
            return redirect('/admin/feedback')->with('msg', '删除成功');
        }
    }
}
