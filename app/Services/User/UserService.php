<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\UserRepository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $token
     * @return bool|mixed
     */
    public function __invoke($token)
    {
        if (!$user = $this->userRepository->findVerifiedToken($token)) {
            return false;
        }

        $data['verified'] = User::VERIFIED_USER;
        $data['verification_token'] = null;

        return $this->userRepository->doUpdate($user->id, $data);
    }
}