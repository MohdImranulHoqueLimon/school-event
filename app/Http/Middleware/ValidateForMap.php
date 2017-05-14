<?php

namespace App\Http\Middleware;

use App\Http\Responses\SimpleResponse;
use Closure;
use Illuminate\Support\Facades\Auth;

class ValidateForMap
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
        if (! Auth::check()) {
            return response()->json(
                new SimpleResponse(false, "unauthorized", '', 401),
                401
            );
        }

        return $next($request);
    }
}
