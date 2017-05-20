<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Responses\ApiResponse;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * @var ApiResponse
     */
    private $apiResponse;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * AuthController constructor.
     * @param ApiResponse $apiResponse
     * @param UserService $userService
     */
    public function __construct(ApiResponse $apiResponse,UserService $userService)
    {

        $this->apiResponse = $apiResponse;
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->apiResponse->error("invalid_credentials");
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->apiResponse->error("could_not_create_token");
        }

        $user = $this->userService->getUserByEmail($credentials['email']);
        //$user['_token']=$token;

        return $this->apiResponse->success($token);
    }

    public function refreshToken()
    {

        try {
            $token = JWTAuth::refresh(JWTAuth::getToken());
            return $this->apiResponse->success($token);
        } catch (\Exception $e) {
            return $this->apiResponse->error("invalid_token");
        }

    }
}
