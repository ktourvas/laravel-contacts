<?php

namespace laravel\contacts;

use Illuminate\Support\ServiceProvider;
use laravel\contacts\Providers\EventServiceProvider;

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
        if(!empty(config('laravel-admin'))) {

            config([
                'laravel-admin.sidebar_includes' => array_merge(
                    config('laravel-admin.sidebar_includes'),
                    [
                        'contacts' => [

                            'head' => [
                                'label' => 'Site Contacts'
                            ],

                            'children' => [
                                [
                                    'label' => 'View',
                                    'url' => '/contacts/'
                                ]
                            ]
                        ]
                    ])
            ]);

            config([
                'laravel-admin.dashboard.blocks' => array_merge(
                    config('laravel-admin.dashboard.blocks'),
                    [
                        \laravel\contacts\Invokable\Unread::class
                    ])
            ]);

        }

        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'laravel\contacts\Providers\EventServiceProvider'
        ];
    }
}
