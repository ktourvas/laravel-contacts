<?php

Route::group([ 'middleware' => [ 'web' ] ], function () {

    Route::post('/contact', 'laravel\contacts\Http\Controllers\LaravelContactsController@submit');

});