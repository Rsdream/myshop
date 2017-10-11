<?php

namespace App\Http\Controllers\Admin\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use DB;

/**
 * @author [Dengjihua] <[<2563654031@qq.com>]>
 *
 * 用来对用户角色的增删改查等操作
 */
class RoleController extends Controller
{
    public function index()
    {

    	$roles = Role::select('id', 'name', 'display_name', 'description')->paginate(6);

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

    		'name' => 'required',
    		'display_name' => 'required',
    		'description' => 'required',
    	],[

            'name.required' => '请填写角色名',
            'display_name.required' => '请填写列表名',
            'description.required' => '请填写描述',
        ]);

    	$role = new Role;
    	$role->name = $request->input('name');
    	$role->display_name = $request->input('display_name');
    	$role->description = $request->input('description');
    	$role->save();

    	return redirect('admin/rbac/role')->with('msg', '添加成功');
    }


    //加载修改页面
    public function show($id)
    {
    	$role = Role::find($id);

        //查询出权限信息
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

    	return redirect('admin/rbac/role')->with('msgg', '修改成功');
    }

    //展示角色的权限信息
    public function details($id)
    {

        $role = Role::find($id);
        // dd($role);

        return view('Admin/admin-role-detail', ['role' => $role]);
    }

    //删除角色
    public function delete($id)
    {

        $role = Role::find($id);

        //先查出角色所用有的权限
        $permissions = [];
        foreach ($role->permissions as $v) {
            $permissions[] = $v->name;
        }

        //删除角色对应的权限
        DB::table('permission_role')->where('role_id', $id)->delete();

        //再删除角色
        $bool = Role::where('id', $id)->delete();
        echo $bool;

    }

}
