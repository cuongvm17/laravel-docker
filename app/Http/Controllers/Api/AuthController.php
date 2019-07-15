<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Services\Login\LoginServiceInterface;
use App\Services\Signup\SignupRequestService;
use App\Services\User\UserServiceInterface;
use Carbon\Carbon;

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
        $this->signupRequestService = $signupRequestService;
        $this->loginService = $loginService;
        $this->userService = $userService;
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if (!$token = $this->loginService->__invoke($request)) {
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
     * @param SignupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(SignupRequest $request)
    {
        return $this->showOne($this->signupRequestService->__invoke($request));
    }

    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify($token)
    {
        if (!$user = $this->userService->__invoke($token)) {
            return $this->showMessage('Not found user has this verify token!');
        }

        return $this->showOne($user);
    }
}