<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Auth\Middleware\Authenticate;

class AuthenticateUser extends Authenticate
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($guards);

        /*if (! $request->user()->hasRole('Admin')) {
            return redirect('/admin');
        }
        if (! $request->user()->hasRole('User')) {
            return redirect('/home');
        }*/

        return $next($request);
    }
}
