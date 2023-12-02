<?php

namespace App\Telegram\Traits;

use App\Models\CarGroup;
use App\Models\CarInstruction;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait ManualsTrait
{
    public function mnls()
    {
        $groups = CarGroup::whereHas('car_instructions')
            ->active()
            ->pluck('title','id')
            ->map(function (string $group, int $id) {
                return Button::make($group)->action('mnlsg')->param('id', $id);
            })
            ->toArray();

        $this->chat->message('Виберіть кузов')
            ->keyboard(Keyboard::make()->buttons($groups)->chunk(3))
            ->send();
    }

    public function mnlsg()
    {
        $carGroup = CarGroup::find($this->data->get('id'));

        $instructions = CarInstruction::with('car_group')
            ->where('car_group_id','=', $carGroup->id)
            ->pluck('title','file')
            ->map(function (string $title, string $file) {
                return Button::make($title)->url(asset($file));
            })
            ->toArray();

        $this->chat->edit($this->messageId)->message('Інструкції для '. $carGroup->title)->send();

        $this->chat
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons($instructions))
            ->send();
    }
}
