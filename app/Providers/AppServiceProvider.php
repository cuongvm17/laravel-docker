<?php

namespace App\Providers;

use App\Repositories\ProfileRepository\ProfileRepository;
use App\Repositories\ProfileRepository\ProfileRepositoryInterface;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Services\Login\LoginService;
use App\Services\Login\LoginServiceInterface;
use App\Services\Signup\SignupRequestService;
use App\Services\Signup\SignupRequestServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);

        $this->app->bind(SignupRequestServiceInterface::class, SignupRequestService::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
