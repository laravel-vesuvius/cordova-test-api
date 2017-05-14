<?php

namespace App\Providers;


use App\Services\Auth\AuthManager;
use App\Services\Auth\RequestTokenStorage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class ApiAuthServiceProvider
 *
 * @package App\Providers
 */
class ApiAuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('api.auth', function ($app) {
            return new AuthManager(new RequestTokenStorage($app->make('request')));
        });
    }
}
