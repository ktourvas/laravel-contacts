<?php

namespace laravel\contacts\Entities\Policies;

use App\User;
use laravel\contacts\Entities\Contact;

class ContactPolicy
{

    public function __construct() {}

    public function viewAny(User $user) {
        return $user->canViewAny(Contact::class);
    }

    public function create(User $user, Contact $contact)
    {
        return $user->canViewAny(Contact::class);
    }

    public function view(User $user, Contact $contact)
    {
        return $user->canView($contact);
    }

    public function update(User $user, Contact $contact)
    {
        return $user->canUpdate($contact);
    }

    public function delete(User $user, Contact $contact)
    {
        return $user->canDelete($contact);
    }

    public function restore(User $user, Contact $contact)
    {
        return $user->canRestore($contact);
    }

    public function forceDelete(User $user, Contact $contact)
    {
        return $user->canForceDelete($contact);
    }

}