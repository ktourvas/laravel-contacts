<?php

namespace laravel\contacts\Invokable;

use laravel\contacts\Contact;

class Unread {

    function __construct()
    {
    }

    function __invoke()
    {
        return $this->fetch();
    }

    protected function fetch() {

        return [

            [
                'type' => 'number-tile',

                'title' => 'Unread messages',

                'number' => Contact::where('processed', 0)->count(),

                'url' => 'contacts',

            ]

        ];

    }

}