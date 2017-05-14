<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 10/18/16
 * Time: 6:10 PM
 */

namespace App\Http\Traits;


use App\Http\Responses\SimpleResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

trait OauthHelperTrait {
    public function getResourceOwner()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(
                    new SimpleResponse(false, "user_not_found", '', 400),
                    400
                );
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(
                new SimpleResponse(false, "token_expired", '', 400),
                400
            );

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(
                new SimpleResponse(false, "token_invalid", '', 400),
                400
            );

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(
                new SimpleResponse(false, "token_absent", '', 400),
                400
            );

        }

        // the token is valid and we have found the user via the sub claim
        return $user;
    }

}