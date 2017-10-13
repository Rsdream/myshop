<?php

namespace App\Http\Middleware;

use Closure;

class RbacRoleMiddleware
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
        $roles = func_get_args();
        while($i < func_num_args()) {

            $role[] = $roles[$i];
            $i++;
        }


        // //查询登录的用户
        $data = $request->session()->get('admin_users');

        foreach ($data as $v) {
            // var_dump($v->role);
            if (!array_intersect($v->role, $role)) {

                return redirect('admin/welcome');
            }
        }
   

        return $next($request);
    }
}
