<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $route = \Request::route();

            if (is_null($route)) {
                return view("errors.wrong");
            }

            $current_route_name = \Request::route()->getName();
            $current_url = \Request::path();
            //$permissions = $this->getAllPermissionName();

            $view->with([
                'current_route_name' => $current_route_name,
                'current_url' => $current_url,
                //'permissions' => $permissions
            ]);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function getAllPermissionName() {
        $results = DB::select(
        DB::raw("
        SELECT temp1.*, rhp.permission_id, p.name
        FROM
        (
            SELECT 
              users.id, 
              users.name, 
              uhr.role_id as user_role
            FROM users
            RIGHT JOIN user_has_roles uhr
            ON users.id = uhr.user_id
            WHERE users.id = " . Auth::user()->id . ") temp1

        RIGHT JOIN role_has_permissions rhp
        ON rhp.role_id = temp1.user_role
        RIGHT join permissions p
        ON p.id = rhp.permission_id")
        );

        $permissionNameArray = array();

        foreach ($results as $permission) {
            array_push($permissionNameArray, $permission->name);
        }

        return $permissionNameArray;
    }
}
