<?php

namespace App\Services\Signup;

use App\Http\Requests\SignupRequest;
use App\Services\BaseServiceInterface;

interface SignupRequestServiceInterface extends BaseServiceInterface
{
    /**
     * @param SignupRequest $request
     * @return mixed
     */
    public function __invoke(SignupRequest $request);
}