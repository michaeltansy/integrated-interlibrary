<?php

namespace App\Providers;

use Dingo\Api\Auth\Provider\Basic;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Basic Authentication
        app('Dingo\Api\Auth\Auth')->extend('basic', function ($app) {
            return new Basic($app['auth'], 'email');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->register('Dingo\Api\Provider\LaravelServiceProvider');
    }
}
