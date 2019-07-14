<?php

namespace App\Services\User;

use App\Services\BaseServiceInterface;

interface UserServiceInterface extends BaseServiceInterface
{
    /**
     * @param $token
     * @return mixed
     */
    public function __invoke($token);
}