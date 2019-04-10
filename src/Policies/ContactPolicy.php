<?php

namespace laravel\contacts\Policies;

use App\User;
use laravel\contacts\Contact;

class ContactPolicy
{
    public function __construct()
    {

    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \laravel\contacts\Contact;  $contact
     * @return bool
     */
    public function update(User $user, Contact $contact)
    {
        return true;
    }
}