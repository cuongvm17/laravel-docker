<?php

namespace App\Services\Login;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginService implements LoginServiceInterface
{
    /**
     * @param LoginRequest $request
     * @return bool
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return false;
        }
        $user = $request->user();
        $tokenResult = $user->createToken('client_personal');

        return $tokenResult;
    }
}