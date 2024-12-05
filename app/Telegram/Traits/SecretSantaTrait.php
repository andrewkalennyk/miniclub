<?php

namespace App\Telegram\Traits;

use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait SecretSantaTrait
{
    public function scrtst()
    {
        $this->chat
            ->message('Виберіть дію:')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Почати заявку')->action('start_santa'),
            ]))
            ->send();
    }

    public function start_santa()
    {
        $this->chat->message('Вкажіть ваші побажання?')->send();


    }
}
