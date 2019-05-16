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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lc');

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes/web.php';
        }

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/laravel-contacts.php' => config_path('laravel-contacts.php'),
        ]);
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
