<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [

        	[
        		'name' => 'user-list',
        		'display_name' => 'User List',
        		'description' => '用户列表',
        	],

        	[
        		'name' => 'user-create',
        		'display_name' => 'User Create',
        		'description' => '用户添加',
        	],

        	[
        		'name' => 'user-show',
        		'display_name' => 'User Show',
        		'description' => '用户修改',
        	],
        	[
        		'name' => 'user-details',
        		'display_name' => 'user Details',
        		'description' => '用户信息',
        	],
        	[
        		'name' => 'user-delete',
        		'display_name' => 'User Delete',
        		'description' => '用户删除',
        	],
            [
                'name' => 'user-update',
                'display_name' => 'User Update',
                'description' => '执行修改',
            ],
            [
                'name' => 'user-disable',
                'display_name' => 'User Disable',
                'description' => '禁用/启用',
            ],
            [
                'name' => 'user-stop',
                'display_name' => 'User Stop',
                'description' => '查看禁用',
            ],


        	[
        		'name' => 'permission-list',
        		'display_name' => 'Permission List',
        		'description' => '权限列表',
        	],

        	[
        		'name' => 'permission-create',
        		'display_name' => 'Permission Create',
        		'description' => '权限添加',
        	],

        	[
        		'name' => 'permission-show',
        		'display_name' => 'Permission Show',
        		'description' => '权限修改',
        	],
        	[
        		'name' => 'permission-details',
        		'display_name' => 'Permission Details',
        		'description' => '权限信息',
        	],
        	[
        		'name' => 'permission-delete',
        		'display_name' => 'Permission Delete',
        		'description' => '权限删除',
        	],

        	[
        		'name' => 'role-list',
        		'display_name' => 'Role List',
        		'description' => '角色列表',
        	],

        	[
        		'name' => 'role-create',
        		'display_name' => 'Role Create',
        		'description' => '角色添加',
        	],

        	[
        		'name' => 'role-show',
        		'display_name' => 'Role Show',
        		'description' => '角色修改',
        	],
        	[
        		'name' => 'role-details',
        		'display_name' => 'Role Details',
        		'description' => '角色信息',
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Role Delete',
        		'description' => '角色删除',
        	],
            [
                'name' => 'role-update',
                'display_name' => 'Role Update',
                'description' => '执行修改',
            ],
        ];

        foreach ($permission as $value) {

        	Permission::create($value);
        }
    }
}
