<?php

namespace App\Http\Middleware;

use App\Http\Responses\SimpleResponse;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Contracts\Events\Dispatcher;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class GetUserFromToken extends BaseMiddleware
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
        if (! $token = $this->auth->setRequest($request)->getToken()) {
            return response()->json(
                new SimpleResponse(false, "token_not_provided", '', 400),
                400
            );
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return response()->json(
                new SimpleResponse(false, "token_expired", '', 400),
                400
            );
        } catch (JWTException $e) {
            return response()->json(
                new SimpleResponse(false, "token_invalid", '', 400),
                400
            );
        }

        if (! $user) {
            return response()->json(
                new SimpleResponse(false, "user_not_found", '', 400),
                400
            );
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}
