<?php

namespace App\Telegram;

use App\Models\City;
use App\Models\LocalClub;
use App\Models\Service;
use App\Models\ServiceType;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Handler extends WebhookHandler
{
    /*public function sto($cityTitle): void
    {
        $services = Service::active()->orderBy('mark', 'desc');
        $type = ServiceType::where('type', 'autoservice')->first();

        if (!empty($cityTitle)) {
            $city = City::where('title', $cityTitle)->orWhere('title_en', $cityTitle)->first();
            if (empty($city)) {
                $allServiceCities = Service::with('city')
                    ->active()
                    ->get()
                    ->pluck('city.title')
                    ->unique()
                    ->implode(', ');

                $this->reply("Нажаль такого міста у нашій базі не існує! \nЄ сервіси в таких містах: " . $allServiceCities);

                exit();
            }

            $services->where('city_id', $city->id);
        }

        $services = $services->where('service_type_id', $type->id)->get();

        $services = $services->map(function ($service) {
            return $service->title .
                " ({$service->mark} &#9733;) <a href='{$service->getUrl()}'>Детальніше</a>";
        })->implode("\n");

        $this->reply($services);
    }*/

    public function cl(): void
    {
        $clubs = LocalClub::with('city')->active()->get()->map(function ($club) {
            $link = $club->hasUrl() ? " <a href='{$club->getUrl()}'>Лінк</a>" : '';
            return $club->city->title . $link;
        })->implode("\n");

        $this->reply($clubs);
    }

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

        $this->chat->message('Виберіть місто')
            ->keyboard($keyboard)
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

        $this->chat->message($services)->send();
    }
}
