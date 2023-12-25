<?php

namespace App\Telegram\Traits;

use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait EventsSchemaTrait
{
        public function es() :void
        {
            $this->chat->message('Виберіть час')
                ->keyboard(Keyboard::make()->buttons([
                    Button::make('12:00')->action('mnlsg')->param('time', '12:00'),
                    Button::make('13:00')->action('mnlsg')->param('time', '13:00'),
                    Button::make('14:00')->action('mnlsg')->param('time', '14:00'),
                    Button::make('15:00')->action('mnlsg')->param('time', '15:00'),
                    Button::make('16:00')->action('mnlsg')->param('time', '16:00'),
                    Button::make('17:00')->action('mnlsg')->param('time', '17:00'),
                    Button::make('18:00')->action('mnlsg')->param('time', '18:00'),
                    Button::make('19:00')->action('mnlsg')->param('time', '19:00'),
                    Button::make('20:00')->action('mnlsg')->param('time', '20:00'),
                ]))
                ->chunk(3)
                ->send();
        }
}
