<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin\Permission;

class RbacPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $i = 2;
        $permi = func_get_args();
        while($i < func_num_args()) {

            $permission[] = $permi[$i];
            $i++;
        }


        $permission_role = [];

        $data = $request->session()->get('admin_users');

        // dd($data);
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

        if (!array_intersect($permission_list, $permission)) {
            return redirect('admin/welcome');
        }

        return $next($request);
    }
}
