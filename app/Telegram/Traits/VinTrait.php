<?php

namespace App\Telegram\Traits;

use App\Services\Crawlers\BidHistory;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait VinTrait
{

    public function vin(string $vin):void
    {
        $bidHistory = (new BidHistory($vin));
        $bidHistoryLink = $bidHistory->findByVin();

        $keyboard = Keyboard::make()
            ->when(!empty($bidHistoryLink), fn(Keyboard $keyboard) => $keyboard->button('BidHistory')->action('vinbh')->param('vinUrl', $bidHistoryLink));

        $this->chat->action(ChatActions::TYPING)->send();

        $this->chat
            ->message('Ресурс')
            ->send();

        $this->chat
            ->edit($this->messageId)
            ->replaceKeyboard($this->messageId, $keyboard)
            ->send();
    }

}
