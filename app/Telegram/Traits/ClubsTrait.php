<?php

namespace App\Telegram\Traits;

use App\Models\LocalClub;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait ClubsTrait
{
    public function cl(): void
    {
        $clubs = LocalClub::with('city')
            ->active()
            ->get()
            ->pluck('city.title', 'id')
            ->map(function (string $club, int $id) {
                return Button::make($club)->action('cll')->param('id', $id);
            })
            ->toArray();

        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat
            ->message('Виберіть місто')
            ->keyboard(Keyboard::make()->buttons($clubs)->chunk(2))
            ->send();
    }

    public function cll():void
    {
        $club = LocalClub::with('city')->find($this->data->get('id'));

        $keyboard = Keyboard::make()
            ->when(empty($club->telegram_url), fn(Keyboard $keyboard) => $keyboard->button('📲 Telegram')->action('cclr')->param('id', $club->id))
            ->when(!empty($club->telegram_url), fn(Keyboard $keyboard) => $keyboard->button('📲 Telegram')->url($club->telegram_url))
            ->when(!empty($club->url), fn(Keyboard $keyboard) => $keyboard->button('📸 Instagram')->url($club->url))
            ->when(true, fn(Keyboard $keyboard) => $keyboard->button('🔙 Назад')->action('clb'));

        $this->chat->edit($this->messageId)->message('Лінки на ресурси')->send();

        $this->chat
            ->edit($this->messageId)
            ->replaceKeyboard($this->messageId, $keyboard)
            ->send();
    }

    public function clb(): void
    {
        $clubs = LocalClub::with('city')
            ->active()
            ->get()
            ->pluck('city.title', 'id')
            ->map(function (string $club, int $id) {
                return Button::make($club)->action('cll')->param('id', $id);
            })
            ->toArray();

        $this->chat->action(ChatActions::TYPING)->send();

        $this->chat->edit($this->messageId)->message('Виберіть місто')->send();

        $this->chat
            ->edit($this->messageId)
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons($clubs)->chunk(2))
            ->send();
    }

    public function cclr()
    {
        //$club = LocalClub::with('city')->find($this->data->get('id'));

        $this->chat->edit($this->messageId)->message(
            'Якщо хочеш в чат, напиши будь ласка в загальному чаті'//$this->responsible
        )->send();
    }
}
