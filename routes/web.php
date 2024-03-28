<?php

use GuzzleHttp\Client;
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

        /*        Route::get('/secret-santa', 'SecretSantaController@showPage')->name('secret-santa');
                Route::get('/secret-santa-info', 'SecretSantaController@showDetailsPage')->name('secret-santa-info');
                Route::post('/secret-santa-form', 'SecretSantaController@saveApplyForm')->name('secret-santa-form');
                Route::post('/secret-santa-details-form', 'SecretSantaController@saveDetailsApplyForm')->name('secresanta-details-form');
        /*
                Route::get('/secret-santa-randomize', 'SecretSantaController@doRandomize');
                Route::get('/secret-santa-letters', 'SecretSantaController@doSendLetters');
                Route::get('/secret-santa-letter-{id}', 'SecretSantaController@doSendLetter');
                Route::get('/secret-santa-letter-details-{id}', 'SecretSantaController@doSendLetterDetails');*/

        Route::get('/ask-us-anything', 'FormController@showAskPage');
        Route::post('/ask-us-anything-form', 'FormController@doAsk')->name('ask-us-anything-form');

        Route::get('/test', function () {

            $telegramBotToken = '7035856860:AAHAq7sH5WaxQDbX2-wthv90j-lQ0Ph513g';

            // API URL для отправки сообщений
            $apiUrl = "https://api.telegram.org/bot{$telegramBotToken}/sendMessage";

            // Создаём клиент Guzzle
            $client = new Client();

            try {
                // Отправляем запрос
                $response = $client->request('POST', $apiUrl, [
                    'json' => [
                        'message_thread_id' => '2',
                        'chat_id' => '-1001806069709',
                        'text' => 'This is a test message from the alert system. Do not pay attention on it'
                    ]
                ]);

                // Получаем и выводим тело ответа (по желанию)
                echo $response->getBody();
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                // Обрабатываем возможные ошибки
                echo $e->getMessage();
            }

        });



    }
);
