<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Permission;
use Illuminate\Http\Request;

class AdminUser extends Model
{
    protected $table = 'admin_users';
    protected $primaryKey = 'id';
    public $timestamps = false;


    //关联角色表
    public function roles()
    {

        return $this->belongsToMany('App\Model\Admin\Role', 'role_user');
    }


    public static function hasPermission( $permission)
    {

    	$permission_role = [];

    	$data = session('admin_users');


        // 得出用户的角色
        foreach ($data as $value) {
            //permission是一个属性
            foreach ($value->permission as $v) {
                //得出角色的权限
                $permission_role[] = $v->permissions->toArray();   
            }
        }

        //再次遍历得到一维数组
        $permission_list = [];
        foreach ($permission_role as $value) {
            foreach ($value as $per) {
                // var_dump($per['name']);
                $permission_list[] = $per['name'];
            }
        }

        //去除重复的权限
        $permission_list = array_unique($permission_list);
        // dd($permission_list, $permission);

        if (!array_intersect($permission_list, [$permission])) {
            return false;
        }

        return true;
    }
}
