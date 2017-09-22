<?php

namespace App\Http\Middleware;

use Closure;

class AdminUser
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

        $session = 'admin_users';
        if (!$request->session()->get($session)) {
            return redirect('admin/login');
        }

        return $next($request);
    }
}
