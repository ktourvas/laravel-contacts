<?php

namespace laravel\contacts\Events;

use Illuminate\Queue\SerializesModels;
use laravel\contacts\Entities\Contact;
use Illuminate\Http\Request;

class ContactSubmitted
{
    use SerializesModels;

    public $request, $contact;

    /**
     * ContactSubmitted constructor.
     * @param Contact $contact
     */
    public function __construct(Request $request, Contact $contact)
    {
        $this->request = $request;
        $this->contact = $contact;
    }
}