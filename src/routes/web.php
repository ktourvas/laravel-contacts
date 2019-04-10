<?php

Route::group([ 'middleware' => [ 'web' ] ], function () {

    Route::post('/contact', 'laravel\contacts\Http\Controllers\LaravelContactsController@submit');

});

Route::group([ 'middleware' => config('laravel-contacts.altering_methods_middleware') ], function () {

    Route::put('/api/contacts/{contact}/processed', 'laravel\contacts\Http\Controllers\LaravelContactsController@processed')
        ->middleware('can:update,contact');

});