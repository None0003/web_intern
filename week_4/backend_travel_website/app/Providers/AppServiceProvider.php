<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\PasswordResetRepositoryInterface;
use App\Repositories\PasswordResetRepository;
use App\Services\AuthServiceInterface;
use App\Services\AuthService;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\PostRepository;
use App\Services\PostServiceInterface;
use App\Services\PostService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PasswordResetRepositoryInterface::class, PasswordResetRepository::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);
    }

    public function boot()
    {
        //
    }
}
