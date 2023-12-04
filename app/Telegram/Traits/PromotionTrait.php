<?php

namespace App\Telegram\Traits;

use App\Models\ClubPromotion;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait PromotionTrait
{
    public function prmt()
    {
        $promotions = ClubPromotion::active()
            ->get()
            ->pluck('title', 'id')
            ->map(function (string $title, int $id) {
                return Button::make($title)->action('prmtnf')->param('id', $id);
            })
            ->toArray();

        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat
            ->message('Cписок плюшок для клубу')
            ->keyboard(Keyboard::make()->buttons($promotions)->chunk(2))
            ->send();
    }

    public function prmtnf()
    {
        $promotion = ClubPromotion::active()->find($this->data->get('id'));

        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat->deleteMessage($this->messageId)->send();

        $this->chat->markdown("*{$promotion->getTitle()}* Пропонує :\n\n {$promotion->getCondition()}")->send();
    }
}
