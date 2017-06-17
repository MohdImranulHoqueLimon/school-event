<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
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
        if (Auth::guest()) {
            return redirect('/');
        }

        if (!$request->user()->hasRole('Admin') && !$request->user()->hasRole('Support-Admin') && $request->user()->hasRole('User')) {
            return redirect('/user/profile');
        }

        return $next($request);
    }
}
