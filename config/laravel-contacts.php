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

    /*
    |--------------------------------------------------------------------------
    | RedemptionCode table name
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify the RedemptionCode model database
    | $table.
    |
    */

    'altering_methods_middleware' => [ 'api', 'auth:api' ],

];
