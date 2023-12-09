<?php

namespace App\Telegram\Traits;

use App\Models\CarGroup;
use App\Models\Sticker;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait StickersTrait
{
    public function strs()
    {
        $stickers = Sticker::active()->get()
            ->pluck('title','id')
            ->map(function (string $group, int $id) {
                return Button::make($group)->action('stcr')->param('id', $id);
            })
            ->toArray();

        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat->message('Виберіть группу наліпок')
            ->keyboard(Keyboard::make()->buttons($stickers)->chunk(2))
            ->send();
    }

    public function stcr()
    {
        $sticker = Sticker::find($this->data->get('id'));

        $otherStickers = Sticker::active()
            ->where('id', '!=', $sticker->id)
            ->get()
            ->pluck('title','id')
            ->map(function (string $group, int $id) {
                return Button::make($group)->action('stcro')->param('id', $id);
            })
            ->toArray();

        $this->chat->action(ChatActions::TYPING)->send();

        $this->chat->edit($this->messageId)->message('Відправлення новою поштою тільки по Україні. (Для Києва отримання наліпок виключно на клубних зустрічах по неділях - інформація в київському чаті)
Вартість 50 грн/шт.
Отже, пишіть свої замовлення мені в особисті повідомлення адміну')
            ->send();

        $this->chat
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons($otherStickers)->chunk(2))
            ->photo($sticker->getPictureUrl())
            ->send();
    }

    public function stcro()
    {
        $sticker = Sticker::find($this->data->get('id'));

        $otherStickers = Sticker::active()
            ->where('id', '!=', $sticker->id)
            ->get()
            ->pluck('title','id')
            ->map(function (string $group, int $id) {
                return Button::make($group)->action('stcr')->param('id', $id);
            })
            ->toArray();

        $this->chat->action(ChatActions::TYPING)->send();

        $this->chat
            ->editMedia($this->messageId)
            ->photo($sticker->getPictureUrl())
            ->send();

        $this->chat
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons($otherStickers)->chunk(2))
            ->send();
    }
}
