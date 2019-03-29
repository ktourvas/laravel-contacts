<?php

Route::group([ 'middleware' => [ 'web' ] ], function () {

    Route::post('/contact', 'laravelContacts\Http\Controllers\LaravelContactsController@submit');

});