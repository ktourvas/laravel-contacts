<?php

Route::group([ 'middleware' => [ 'web' ] ], function () {

    Route::group([ 'middleware' => [ 'LaravelAdmin' ] ], function () {
        Route::get(config('laravel-admin.root_url').'/contacts', 'laravel\contacts\Http\Controllers\LaravelContactsAdminController@index');
    });

});

Route::prefix('api')->group(function () {

    Route::group([ 'middleware' => [ 'api' ] ], function () {

        Route::post('contacts', 'laravel\contacts\Http\Controllers\LaravelContactsController@submit');

        Route::group([ 'middleware' => [ 'auth:api', 'LaravelAdmin' ] ], function () {

            Route::put('contacts/{contact}/processed', 'laravel\contacts\Http\Controllers\LaravelContactsController@processed')
                ->middleware('can:update,contact');

        });

    });

});
