<?php

namespace App\Repositories\UserRepository;

use App\Models\User;
use App\Repositories\AbstractBaseRepository;

class UserRepository extends AbstractBaseRepository implements UserRepositoryInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }
}