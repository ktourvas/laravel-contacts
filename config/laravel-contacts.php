<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Contact table name
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify the Contact model database
    | $table.
    |
    */

    'contacts_table' => 'contacts',

    'submit' => [

        'rules' => [
            'name' => 'required|max:200',
            'surname' => 'required|max:200',
            'email' => 'required|email',
            'msg' => 'required|max:1000',
        ],
        'messages' => [
            'name.required' => 'Το πεδίο Όνομα είναι υποχρεωτικό',
            'surname.required' => 'Το πεδίο Επώνυμο είναι υποχρεωτικό',
            'email.required' => 'Το πεδίο E-mail είναι υποχρεωτικό',
            'msg.required' => 'Παρακαλούμε συμπλήρωσε το μήνυμά σας',
        ]

    ],

    'mail_contacts_to' => 'k.tourvas@gmail.com'

];
