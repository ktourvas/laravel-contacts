<?php

namespace laravel\contacts\Events;

use Illuminate\Queue\SerializesModels;
use laravel\contacts\Entities\Contact;

class ContactSubmitted
{
    use SerializesModels;

    public $contact;

    /**
     * ContactSubmitted constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
}