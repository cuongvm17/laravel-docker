<?php

namespace App\Repositories\UserRepository;

use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $token
     * @return mixed
     */
    public function findVerifiedToken($token);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);
}