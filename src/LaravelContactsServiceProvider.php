<?php

namespace laravel\contacts;

use Illuminate\Support\ServiceProvider;

class LaravelContactsServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes/web.php';
        }
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
//        return [  ];
    }
}
