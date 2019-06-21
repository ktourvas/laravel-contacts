<?php

namespace laravel\contacts\Policies;

use App\User;
use laravel\contacts\Contact;

class ContactPolicy
{

    public function __construct()
    {

    }

    public function viewAny(User $user) {
        return true;
    }

    public function view(User $user, Contact $contact)
    {
        return false;
    }

    public function create(User $user, Contact $contact)
    {
        return false;
    }

    public function update(User $user, Contact $contact)
    {
        return false;
    }

    public function delete(User $user, Contact $contact)
    {
        return false;
    }

    public function restore(User $user, Contact $contact)
    {
        return false;
    }

    public function forceDelete(User $user, Contact $contact)
    {
        return false;
    }

}