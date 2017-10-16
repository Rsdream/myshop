<?php

namespace App\Http\Controllers\Admin\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminUser;
use App\Model\Admin\Role;
use DB;
use App\Http\Requests\AdminInsert;

/**
 * @author [Dengjihua] <[<2563654031@qq.com>]>
 */
class UserController extends Controller
{

    //显示用户列表页
    public function index()
    {
    	$user = AdminUser::where('status', 0)->paginate(6);
        $data = session('admin_users');
        foreach ($data as $v) {
            $session = $v;
        }
    	return view('Admin/admin-list', ['users' => $user, 'session' => $session]);
    }

    //加载添加页面
    public function create()
    {
    	$role = Role::select('id', 'name', 'display_name', 'description')->get();

    	return view('Admin/admin-user-insert', ['role' => $role]);
    }


    //执行添加
    public function store(AdminInsert $request)
    {
    	$user = new AdminUser;
    	$user->uid = $request->input('uid');
    	$user->pass = $request->input('pass');
    	$user->name = $request->input('name');
    	$user->sex = $request->input('sex');
    	$user->phone = $request->input('phone');
    	$user->email = $request->input('email');
    	$user->address = $request->input('address');
    	$user->status = $request->input('status');
    	$user->save();

    	//添加角色
        if ($request->input('roles')) {
            $role_user = [];
            foreach ($request->input('roles') as $v) {
                $role_user[] = ['role_id' => $v, 'admin_user_id' => $user->id];
            }

            DB::table('role_user')->insert($role_user);
        }

    	return redirect('admin/rbac/user')->with('msg', '添加成功');
    }


    //加载修改页面
    public function show($id)
    {
    	$user = AdminUser::find($id);
        $role = Role::select('id', 'name', 'display_name', 'description')->get();

    	return view('Admin/admin-user-edit', ['user' => $user, 'roles' => $role]);
    }

    //执行修改
    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => 'required',
            'pass' => 'required',
            'sex' => 'required',
    		'phone' => 'required',
            'email' => 'required',
            'roles' => 'required',
    	],[
            'name.required' => '用户名不能为空',
            'pass.required' => '密码不能为空',
            'sex.required' => '性别不能为空',
            'phone.required' => '电话不能为空',
            'email.required' => '邮箱不能为空',
            'roles.required' => '角色不能为空',
        ]);

    	$user = AdminUser::find($id);
    	$user->name = $request->input('name');
        $user->sex = $request->input('sex');
        $user->phone = $request->input('phone');
    	$user->email = $request->input('email');
        $user->pass = $request->input('pass');

    	$user->update();

        //要先删除角色再添加角色
        DB::table('role_user')->where('admin_user_id', $id)->delete();

        $role_user = [];
        foreach ($request->input('roles') as $v) {

            $role_user[] = ['role_id' => $v, 'admin_user_id' => $user->id];
        }
        DB::table('role_user')->insert($role_user);

    	return redirect('admin/rbac/user')->with('msgg', '修改成功');
    }

    //查看用户详情
    public function details(Request $request,$id)
    {
        $user = AdminUser::find($id);

        return view('Admin/admin-user-details', ['user' => $user]);
    }

    //禁用启用用户
    public function disable(Request $request, $id)
    {
        $bool = DB::table('admin_users')->where('id', $id)->update(['status' => $_GET['status'] ]);

        echo $bool;
    }

    //查看禁用的用户
    public function showDisable()
    {
        $user = AdminUser::where('status', 1)->get();
        return view('Admin/admin-stop-user', ['user' => $user]);
    }
}
