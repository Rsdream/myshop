<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 后台会员管理控制类
 * @author rong <[<871513137@qq.com>]>
 *
 */
class HomeUsersController extends Controller
{
    //查询全部会员信息
    public function homeUsersList()
    {
        //查询全部会员信息
        $homeUsers = DB::table('home_users')
            ->select('id', 'uid', 'name', 'sex', 'phone', 'email', 'address', 'status', 'addtime')
            ->get()
            ->toArray();
        return view('Admin/member-list', ['userlist' => $homeUsers]);
    }

    //执行停用、启用用户
    public function stopAndStart(Request $request)
    {
        //获取要修改的用户id、和状态
        $userId = $request->input('id');
        $userStatus = $request->input('status')==1?0:1;
        //执行修改
        $bool = DB::table('home_users')
            ->where('id', $userId)
            ->update(['status' => $userStatus] );
        return $bool;
    }

    
    public function level()
    {
        //查询
        $homeUsers = DB::table('home_users')
            ->select('id', 'uid', 'name', 'sex', 'phone', 'email', 'growth', 'score')
            ->get()
            ->toArray();
        //判断成长值对应会员等级
        foreach($homeUsers as $k => $v) {
            if ($v->growth >= 10000) {
                $v->growths = '黄金会员';
            } elseif ($v->growth >= 30000) {
                $v->growths = '钻石会员';
            } else {
                $v->growths = '普通会员';
            }
        }
        return view('Admin/member-level', ['userlist' => $homeUsers]);
    }
}
