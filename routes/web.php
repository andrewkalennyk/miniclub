<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[a-z0-9-]+');

Route::group(
    ['prefix' => LaravelLocalization::setLocale()],
    function () {
        Route::get('/podii/{slug}-{id}', 'EventController@showPage')->name('event');

        Route::post('/propose', 'FormController@doPropose')->name('propose');
    }
);
