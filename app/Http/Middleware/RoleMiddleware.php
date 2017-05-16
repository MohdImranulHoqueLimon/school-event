<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param                           $role
     * @param                           $permission
     *
     * @return mixed
     */
    //public function handle($request, Closure $next, $role = 'Admin', $permission = null)
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (Auth::guest()) {
            return redirect('/');
        }

        /*if ($request->user()->hasRole('Admin')) {
            return $next($request);
        }

        if ($request->user()->hasRole('User')) {
            return redirect('/user');
        }*/

        if (! $request->user()->hasRole($role)) {
            //abort(403, 'Insufficient permissions');
            return redirect('admin/404');
        }

        if ($permission && ! $request->user()->can($permission)) {
            //abort(403, 'Insufficient permissions');
            return redirect('admin/404');
        }

        return $next($request);
    }
}
