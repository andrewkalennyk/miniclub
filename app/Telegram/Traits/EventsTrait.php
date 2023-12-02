<?php

namespace App\Telegram\Traits;

use App\Models\TelegramEvent;
use App\Models\TelegramNumberUser;
use Carbon\Carbon;

trait EventsTrait
{
    public function ne(string $name):void
    {
        $event = TelegramEvent::create(
            [
                'title' => $name,
                'event_at' => Carbon::now()->format('Y-m-d')
            ]
        );

        $this->chat->message("{$event->title} - {$event->id} Доданий")->send();
    }

    public function ec(string $number):void //event car
    {
        $str = explode('-', $number);

        $carNumber = $str[0];
        $eventId = $str[1];

        $telegramNumberUser = TelegramNumberUser::firstOrCreate(['number' => $carNumber]);

        $telegramNumberUser->telegram_events()->sync([$eventId]);

        $this->chat->message("{$carNumber} Прив'язаний до івенту {$eventId}")->send();
    }
}
