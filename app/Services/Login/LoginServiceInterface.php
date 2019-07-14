<?php

namespace App\Services\Login;

use App\Http\Requests\LoginRequest;
use App\Services\BaseServiceInterface;

interface LoginServiceInterface extends BaseServiceInterface
{
    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function __invoke(LoginRequest $request);
}