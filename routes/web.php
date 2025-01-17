<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[a-z0-9-]+');

Route::group(
    ['prefix' => LaravelLocalization::setLocale()],
    function () {
        Route::get('/podii/{slug}-{id}', 'EventController@showPage')->name('event');
        Route::get('/shvidki-zustrichi/{slug}-{id}', 'EventController@showFastEvent')->name('fast-event');

        Route::get('/servisi/{slug}-{id}', 'ServiceController@showService')->name('service');

        Route::get('/klubni-tacki/{slug}', 'ClubCarsController@showCarDetail')->name('car-detail');

        Route::get('/servisi/vidguk/{slug}-{id}', 'ReviewController@showReview')->name('review');

        Route::post('/propose', 'FormController@doPropose')->name('propose');
        Route::post('/review', 'FormController@doReview')->name('review-form');
        Route::post('/share-service', 'FormController@doShareService')->name('share-service-form');
        Route::post('/fast-event', 'FormController@addFastEvent')->name('fast-event-form');
        Route::post('/fast-event/checkin', 'FormController@addFastEventCheckIn')->name('fast-event-checkin-form');

         Route::get('/secret-santa', 'SecretSantaController@showPage')->name('secret-santa');
         Route::get('/secret-santa-info', 'SecretSantaController@showDetailsPage')->name('secret-santa-info');
         Route::post('/secret-santa-form', 'SecretSantaController@saveApplyForm')->name('secret-santa-form');
         Route::post('/secret-santa-details-form', 'SecretSantaController@saveDetailsApplyForm')->name('secret-santa-details-form');

        Route::get('/secret-santa-randomize', 'SecretSantaController@doRandomize');
        Route::get('/secret-santa-randomize-from', 'SecretSantaController@doRandomizeFrom');
        Route::get('/secret-santa-letters', 'SecretSantaController@doSendLetters');
        Route::get('/secret-santa-letters-from', 'SecretSantaController@doSendLettersFrom');
        Route::get('/secret-santa-letter-{id}', 'SecretSantaController@doSendLetter');
        Route::get('/secret-santa-letter-details-{id}', 'SecretSantaController@doSendLetterDetails');

        Route::get('/ask-us-anything', 'FormController@showAskPage');
        Route::post('/ask-us-anything-form', 'FormController@doAsk')->name('ask-us-anything-form');

        Route::get('/bot-push', 'FormController@showBotMessagePage');
        Route::post('/bot-push-form', 'FormController@doBotMessageApply')->name('send-bot-form');

        Route::get('/sitemap', 'SitemapController@generateSitemap');

        /*Route::get('/zapit-na-zbir', 'FormController@showDonatePage');
        Route::post('/zapit-na-zbir-form', 'FormController@doDonateApply')->name('donate-form');*/
    }
);
