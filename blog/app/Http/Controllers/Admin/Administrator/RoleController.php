<?php

namespace App\Http\Controllers\Admin\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use DB;

class RoleController extends Controller
{
    public function index()
    {

    	$roles = Role::select('id', 'name', 'display_name', 'description')->get();
    	return view('Admin/admin-roles', ['roles' => $roles]);
    }

    //加载添加页面
    public function create()
    {
    	return view('Admin/admin-role-create');
    }


    //执行添加
    public function store(Request $request)
    {
    	$this->validate($request, [

    		'name' => 'required|unique:roles,name',
    		'display_name' => 'required',
    		'description' => 'required',
    	]);

    	$role = new Role;
    	$role->name = $request->input('name');
    	$role->display_name = $request->input('display_name');
    	$role->description = $request->input('description');
    	$role->save();

    	return redirect('admin/role')->with('msg', '添加成功');
    }


    //加载修改页面
    public function show($id)
    {
    	$role = Role::find($id);
        $permission = Permission::select('id', 'name', 'display_name', 'description')->get();
    	return view('Admin/admin-role-edit', ['role' => $role, 'permission' => $permission]);
    }

    //执行修改
    public function update(Request $request, $id)
    {

    	$this->validate($request, [
    		'display_name' => 'required',
            'description' => 'required',
    		'permission' => 'required',
    	]);

    	$role = Role::find($id);
    	$role->display_name = $request->input('display_name');
    	$role->description = $request->input('description');
    	$role->update();

        //要先删除再添加
        DB::table('permission_role')->where('role_id', $id)->delete();

        $permission_role = [];
        foreach ($request->input('permission') as $v) {

            $permission_role[] = ['role_id' => $id, 'permission_id' => $v];
        }
        DB::table('permission_role')->insert($permission_role);

    	return redirect('admin/role')->with('msgg', '修改成功');
    }

    //展示用户的权限信息
    public function details($id)
    {

    }

}
