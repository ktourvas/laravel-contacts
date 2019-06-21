<?php

namespace laravel\contacts\Listeners;

use laravel\contacts\Events\ContactSubmitted;

class NewSubmissionMailer
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ContactSubmitted $event
     * @return void
     */
    public function handle(ContactSubmitted $event)
    {
        if( !empty( config('laravel-contacts.mail_contacts_to' ) ) ) {
            \Mail::to(
                config('laravel-contacts.mail_contacts_to')
            )
                ->send(new \laravel\contacts\Mail\ContactSubmitted($event->contact));
        }
    }
}