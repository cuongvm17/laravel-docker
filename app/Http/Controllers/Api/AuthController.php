<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Services\Login\LoginServiceInterface;
use App\Services\Signup\SignupRequestService;
use App\Services\User\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * @group User authentication
 *
 * Class AuthController available for user signup, login and verify request
 *
 * @package App\Http\Controllers\Api
 */
class AuthController extends ApiController
{
    /**
     * @var SignupRequestService
     */
    private $signupRequestService;

    /**
     * @var
     */
    private $userService;

    /**
     * @var
     */
    private $loginService;

    /**
     * AuthController constructor.
     * @param SignupRequestService $signupRequestService
     * @param LoginServiceInterface $loginService
     * @param UserServiceInterface $userService
     */
    public function __construct(SignupRequestService $signupRequestService, LoginServiceInterface $loginService, UserServiceInterface $userService)
    {
        $this->middleware('client.credentials')->only(['signup']);
        $this->middleware('auth:api')->only(['logout']);
        $this->signupRequestService = $signupRequestService;
        $this->loginService = $loginService;
        $this->userService = $userService;
    }

    /**
     * User login
     *
     * @bodyParam email string required The email of user registered.
     * @bodyParam password string required The password of user.
     *
     * @response {
     *    "data": {
     *      "access_token": "uO3Qa_G76J6ARt1zUjXVxquyZ2amEp2fp3Owh5b3lWumGiT6qk",
     *      "token_type": "Bearer",
     *      "expires_at": "2020-07-15 17:09:43"
     *   }
     * }
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $loginService = $this->loginService;
        if (!$token = $loginService($request)) {
            return $this->showMessage('Login failed!');
        }

        return $this->showMessage([
            'access_token' => $token->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $token->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * User signup
     *
     * @authenticated Bearer {access_token}
     *
     * @bodyParam email string required The email of user.
     * @bodyParam password string required The password of user.
     * @bodyParam password_confirmation string required The password confirmation.
     *
     * @response {
     *  "data": {
     *      "email": "jacky@gmail.com",
     *      "verified": "0",
     *      "verification_token": "5ZIUdiY1tDizRaTARKV0V3lJaH3biTimqdYYWO8j",
     *      "last_update": "2019-07-15 15:42:18",
     *      "creation_date": "2019-07-15 15:42:18",
     *      "id": 1
     *  }
     * }
     * @param SignupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(SignupRequest $request)
    {
        $signupService = $this->signupRequestService;

        return $this->showOne($signupService($request));
    }

    /**
     * Verify user account
     *
     * @response {
     *   "data": {
     *      "email": "jacky+11@gmail.com",
     *      "verified": "1",
     *      "verification_token": null",
     *      "last_update": "2019-07-15 15:42:18",
     *      "creation_date": "2019-07-15 15:42:18",
     *      "id": 21
     *  }
     * }
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify($token)
    {
        $userService = $this->userService;
        if (!$user = $userService($token)) {
            return $this->showMessage('Invalid verify token. User not found!');
        }

        return $this->showOne($user);
    }

    /**
     * User logout
     *
     * @authenticated Bearer {access_token}
     *
     * @response {
     *  "data": "User success response!"
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return $this->showMessage('User success logout!');
    }
}