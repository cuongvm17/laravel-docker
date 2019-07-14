<?php

namespace App\Services\Signup;

use App\Events\UserRegistered;
use App\Http\Requests\SignupRequest;
use App\Repositories\UserRepository\UserRepositoryInterface;

class SignupRequestService implements SignupRequestServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * SignupRequestService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param SignupRequest $request
     * @return mixed
     */
    public function __invoke(SignupRequest $request)
    {
        $user = $this->userRepository->doSave($request);
        event(new UserRegistered($user));

        return $user;
    }
}