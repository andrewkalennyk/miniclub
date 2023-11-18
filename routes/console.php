<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('register-bot-commands', function () {
    $telegraphBot = \DefStudio\Telegraph\Models\TelegraphBot::fromId(1);

    $telegraphBot->registerCommands([
        '/cl' => 'Вивести всі локальні клуби',
        '/ss'  => 'Сервіси'
    ])->send();
})->purpose('Register new comands for telegram bot');


