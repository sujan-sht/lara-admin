<?php

namespace App\Providers;


use App\Mixins\AdminRouteMixins;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //Repository Interface Binding
        $this->repos();

        //Admin Route Mixins
        Route::mixin(new AdminRouteMixins());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }

    protected function repos()
    {
        $this->app->bind(\App\Contracts\RoleRepositoryInterface::class, \App\Repositories\RoleRepository::class);
        $this->app->bind(\App\Contracts\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);


    }
}
