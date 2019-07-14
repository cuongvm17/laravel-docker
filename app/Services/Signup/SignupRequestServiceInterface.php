<?php

namespace App\Services\Signup;

use App\Http\Requests\SignupRequest;

interface SignupRequestServiceInterface
{
    /**
     * @param SignupRequest $request
     * @return mixed
     */
    public function __invoke(SignupRequest $request);
}