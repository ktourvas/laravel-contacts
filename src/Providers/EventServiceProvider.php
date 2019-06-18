<?php

namespace laravel\contacts\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use laravel\contacts\Events\ContactSubmitted;
use laravel\contacts\Listeners\NewSubmissionMailer;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //
        ContactSubmitted::class => [
            NewSubmissionMailer::class
        ]
    ];

}