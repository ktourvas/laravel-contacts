<?php

Route::group([ 'middleware' => [ 'web' ] ], function () {

    Route::group([ 'middleware' => [
        'LaravelAdmin',
        'can:viewany,laravel\contacts\Entities\Contact'
    ] ], function () {

        Route::get(config('laravel-admin.root_url').'/contacts', 'laravel\contacts\Http\Controllers\LaravelContactsAdminController@index');

    });

    Route::post('api/contacts', 'laravel\contacts\Http\Controllers\LaravelContactsController@submit');

});

Route::prefix('api')->group(function () {

    Route::group([ 'middleware' => [ 'api' ] ], function () {

        Route::group([ 'middleware' => [ 'auth:api', 'LaravelAdmin' ] ], function () {

            Route::put('contacts/{contact}/processed', 'laravel\contacts\Http\Controllers\LaravelContactsController@processed')
                ->middleware('can:update,contact');

            Route::delete('contacts/{contact}', 'laravel\contacts\Http\Controllers\LaravelContactsController@delete')
                ->middleware('can:delete,contact');


        });

    });

});
