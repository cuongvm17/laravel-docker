<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use Closure;

class UserResourceMiddleware
{
    use ApiResponser;

    const API_KEY = 'X-API-KEY';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->isValidApiKey($request->header(self::API_KEY))) {
            return $this->showMessage('Access denied!');
        }

        return $next($request);
    }

    /**
     * @param string $apiKey
     * @return bool
     */
    private function isValidApiKey($apiKey = '')
    {
        return $apiKey == config('passport.api_key') ? true : false;
    }
}
