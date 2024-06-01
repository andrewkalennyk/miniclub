<?php

namespace App\Telegram\Traits;

use App\Models\FastEvent;
use App\Models\FastEventUser;
use App\Models\TelegramEvent;
use App\Models\TelegramNumberUser;
use Carbon\Carbon;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

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

    public function sz():void
    {
        $events = FastEvent::date()
            ->orderBy('date', 'asc')
            ->get()
            ->map(function ($event) {
                return Button::make($event->getTitleDate())->action('szi')->param('id', $event->id);
            })
            ->toArray();

        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat
            ->message('Виберіть зустріч')
            ->keyboard(Keyboard::make()->buttons($events)->chunk(2))
            ->send();
    }

    public function szi():void
    {
        $event = FastEvent::find($this->data->get('id'));

        $this->chat->action(ChatActions::TYPING)->send();

        $checkIn = FastEventUser::byUserEvent($this->chat->info()['username'], $event->id)->exists();

        $keyboard = Keyboard::make()
            ->when(!$checkIn, fn(Keyboard $keyboard) => $keyboard->button('Зачекінитись')->action('szi_ch')->param('id', $event->id))
            ->when($checkIn, fn(Keyboard $keyboard) => $keyboard->button('Розчекінитись')->action('szi_uch')->param('id', $event->id));

        $this->chat->edit($this->messageId)->message($event->title)->send();

        $this->chat
            ->edit($this->messageId)
            ->replaceKeyboard($this->messageId, $keyboard)
            ->send();
    }

    public function szi_ch():void
    {
        $event = FastEvent::find($this->data->get('id'));

        $this->chat->action(ChatActions::TYPING)->send();

        $userName = $this->chat->info()['username'];

        try {
            (new FastEventUser)->createApply([
                'fast_event_id' => $event->id,
                'user' => $userName
            ]);
            $this->chat->edit($this->messageId)->message("Дякую $userName! Чекаємо на тебе...")->send();
        } catch (\Exception $e) {
            \Log::info($e);
            $this->chat->edit($this->messageId)->message("Щось пішло не так!( Вибачте!")->send();
        }
    }

    public function szi_uch():void
    {
        $this->chat->action(ChatActions::TYPING)->send();

        $event = FastEvent::find($this->data->get('id'));
        $userName = $this->chat->info()['username'];

        try {
            (new FastEventUser)->deleteApply([
                'fast_event_id' => $event->id,
                'user' => $userName
            ]);
            $this->chat->edit($this->messageId)->message("Дякую $userName! Зустрінемось наступного разу...")->send();
        } catch (\Exception $e) {
            \Log::info($e);
            $this->chat->edit($this->messageId)->message("Щось пішло не так!( Вибачте!")->send();
        }
    }

}
