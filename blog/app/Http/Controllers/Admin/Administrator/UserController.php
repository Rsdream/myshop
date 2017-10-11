<?php

namespace App\Http\Controllers\Admin\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminUser;
use App\Model\Admin\Role;
use DB;

class UserController extends Controller
{
    public function index()
    {

    	$user = AdminUser::get();
        // $user = AdminUser::find(1);
        // foreach ($user->roles as $role) {
        //     var_dump($role);
        // }

        // die;

    	return view('Admin/admin-list', ['users' => $user]);
    }

    //加载添加页面
    public function create()
    {
    	$role = Role::select('id', 'name', 'display_name', 'description')->get();

    	return view('Admin/admin-user-insert', ['role' => $role]);
    }


    //执行添加
    public function store(Request $request)
    {

        //表单规则
    	$this->validate($request, [

    		'uid' => 'required|unique:admin_users,uid',
    		'pass' => 'required',
    		'name' => 'required',
    		'sex' => 'required',
    		'phone' => 'required',
    		'email' => 'required',
    		'address' => 'required',
    	]);

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
    	$role_user = [];
    	foreach ($request->input('roles') as $v) {

    		$role_user[] = ['role_id' => $v, 'admin_user_id' => $user->id];
    	}
    	DB::table('role_user')->insert($role_user);

    	return redirect('admin/user')->with('msg', '添加成功');
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
            'email' => 'required|email|unique:admin_users,email,'.$id,
            'roles' => 'required'
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
        

    	return redirect('admin/user')->with('msgg', '修改成功');
    }
}
