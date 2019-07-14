<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Traits\ApiResponser;

class UserController extends ApiController
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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if ($result = $this->userRepository->getList()) {
            return $this->showAll($result);
        }

        return $this->showMessage('Cannot found any user!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        if ($result = $this->userRepository->getById($id)) {
            return $this->showOne($result);
        }

        return $this->showMessage('User not found!');
    }
}