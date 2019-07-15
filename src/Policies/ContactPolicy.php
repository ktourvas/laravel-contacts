<?php

namespace laravel\contacts\Policies;

use App\User;
use laravel\contacts\Contact;

class ContactPolicy
{

    public function __construct() {}

    public function viewAny(User $user) {
        return $user->permissions()
                ->where('policy', 'Contact')
                ->where('viewany', 1)
                ->count() === 1;
    }

    public function create(User $user, Contact $contact)
    {
        return $user->permissions()
                ->where('policy', 'Contact')
                ->where('create', 1)
                ->count() === 1;
    }

    public function view(User $user, Contact $contact)
    {
        return $user
                ->permissions()
                ->where('policy', 'Contact')
                ->where(function($q) use ($contact) {
                    $q->where('view', 1)
                        ->orWhereHas('records', function($q) use ($contact) {
                            $q->where('record_id', $contact->id)->where('view', 1);
                        });
                })
                ->count() > 0;
    }

    public function update(User $user, Contact $contact)
    {
        return $user
                ->permissions()
                ->where('policy', 'Contact')
                ->where(function($q) use ($contact) {
                    $q->where('update', 1)
                        ->orWhereHas('records', function($q) use ($contact) {
                            $q->where('record_id', $contact->id)->where('update', 1);
                        });
                })
                ->count() > 0;
    }

    public function delete(User $user, Contact $contact)
    {
        return $user
                ->permissions()
                ->where('policy', 'Contact')
                ->where(function($q) use ($contact) {
                    $q->where('delete', 1)
                        ->orWhereHas('records', function($q) use ($contact) {
                            $q->where('record_id', $contact->id)->where('delete', 1);
                        });
                })
                ->count() > 0;
    }

    public function restore(User $user, Contact $contact)
    {
        return $user
                ->permissions()
                ->where('policy', 'Contact')
                ->where(function($q) use ($contact) {
                    $q->where('delete', 1)
                        ->orWhereHas('records', function($q) use ($contact) {
                            $q->where('record_id', $contact->id)->where('delete', 1);
                        });
                })
                ->count() > 0;
    }

    public function forceDelete(User $user, Contact $contact)
    {
        return $user
                ->permissions()
                ->where('policy', 'Contact')
                ->where(function($q) use ($contact) {
                    $q->where('delete', 1)
                        ->orWhereHas('records', function($q) use ($contact) {
                            $q->where('record_id', $contact->id)->where('delete', 1);
                        });
                })
                ->count() > 0;
    }

}