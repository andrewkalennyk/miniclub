<?php

namespace App\Telegram\Traits;

use App\Models\Service;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait ServiceTrait
{
    public function ss(): void
    {
        $services = Service::active()
            ->with(['service_type'])
            ->get()
            ->pluck('service_type.title', 'service_type.id')
            ->unique();

        $buttons = collect([]);
        foreach ($services as $id => $service) {
            $buttons->push(Button::make($service)->action('ssc')->param('id', $id));
        }

        $buttons = $buttons->chunk(2);

        $keyboard = Keyboard::make();

        foreach ($buttons as $row) {
            $keyboard->row($row->toArray());
        }

        $this->chat->message('Виберіть сервіс')
            ->keyboard($keyboard)
            ->send();
    }

    public function ssc(): void
    {
        $serviceTypeId = $this->data->get('id');

        $services = Service::active()
            ->with(['city'])
            ->where('service_type_id', $serviceTypeId)
            ->get()
            ->pluck('city.title', 'city.id')
            ->unique();

        $buttons = collect([]);
        foreach ($services as $id => $service) {
            $buttons->push(Button::make($service)->action('sst')->param('params', $serviceTypeId . '-' . $id));
        }

        $buttons = $buttons->chunk(2);

        $keyboard = Keyboard::make();

        foreach ($buttons as $row) {
            $keyboard->row($row->toArray());
        }

        $this->chat->edit($this->messageId)->message('Виберіть місто')->send();
        $this->chat
            ->replaceKeyboard($this->messageId, $keyboard)
            ->send();
    }

    public function sst(): void
    {
        $params = explode('-', $this->data->get('params'));
        $services = Service::active()
            ->with(['city'])
            ->where('service_type_id', $params[0])
            ->where('city_id', $params[1])
            ->get();

        $services = $services->map(function ($service) {
            return $service->title .
                " ({$service->mark} &#9733;) <a href='{$service->getUrl()}'>Детальніше</a>";
        })->implode("\n");

        $this->chat->deleteKeyboard($this->messageId);

        $this->chat->edit($this->messageId)->message($services)->send();
    }
}
