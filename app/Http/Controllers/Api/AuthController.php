<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Services\Signup\SignupRequestService;
use App\Traits\ApiResponser;

class AuthController extends ApiController
{
    use ApiResponser;
    /**
     * @var SignupRequestService
     */
    private $signupRequestService;

    public function __construct(SignupRequestService $signupRequestService)
    {
        parent::__construct();
        $this->signupRequestService = $signupRequestService;
    }

    public function login(LoginRequest $request)
    {

    }

    /**
     * @param SignupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(SignupRequest $request)
    {
        return $this->showOne($this->signupRequestService->__invoke($request));
    }
}