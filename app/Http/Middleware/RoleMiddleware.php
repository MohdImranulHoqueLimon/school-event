<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\DB;

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
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (Auth::guest()) {
            return redirect('/');
        }

        if ($request->user()->hasRole('Admin') || $request->user()->hasRole('Support-Admin')) {
            return $next($request);
        }

        if ($request->user()->hasRole('User')) {
            return redirect('/user/profile');
        }

        if (!$request->user()->hasRole($role)) {
            return redirect('admin/404');
        }

        /*if ($permission && !$request->user()->can($permission)) {
            //abort(403, 'Insufficient permissions');
            return redirect('admin/404');
        }*/

        /*if(isset($request) && $request->url() != '') {
            $currentUrl = $request->url();
            $urlInfo = explode('admin', $currentUrl);
            $permissionName = trim($urlInfo[1], '/');
        }*/
        //else {
            /*$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $urlInfo = explode('/', $currentUrl);
            $permissionName = trim($urlInfo[4]);*/
        //}


        /*$permissionFound = false;

        $permit = DB::table('permissions')->where('name', $permissionName)->first();
        if(!empty($permit)) {

            $permissionId = $permit->id;

            foreach ($request->user()->roles as $userRole) {

                $roleHasPermission = DB::table('role_has_permissions')
                    ->where('permission_id', $permissionId)
                    ->where('role_id', $userRole->id)
                    ->first();

                if(!empty($roleHasPermission)) {
                    $permissionFound = true;
                    break;
                }
            }
        }

        if($permissionFound == false) {
            return redirect('admin/404');
        }*/

        return $next($request);
    }
}
