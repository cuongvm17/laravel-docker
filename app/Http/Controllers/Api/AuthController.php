<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Traits\ApiResponser;

class AuthController extends ApiController
{
    use ApiResponser;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * AuthController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
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
        return $this->showOne($this->userRepository->doSave($request));
    }
}