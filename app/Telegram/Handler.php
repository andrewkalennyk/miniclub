<?php
namespace App\Telegram;

use App\Models\City;
use App\Models\Service;
use App\Models\ServiceType;
use \DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;

class Handler extends WebhookHandler
{
    public function sto($cityTitle): void
    {
        $services = Service::active()->orderBy('mark');
        $type = ServiceType::where('type', 'autoservice')->first();

        if (!empty($cityTitle)) {
            $city = City::where('title', $cityTitle)->orWhere('title_en', $cityTitle)->first();
            if (empty($city)) {
                $this->reply('Нажаль такого міста у нашій базі не існує!');
                exit();
            }

            $services->where('city_id', $city->id);
        }

        $services = $services->where('service_type_id', $type->id)->limit(5)->get();

        Log::info($services->toJson());

        $services = $services->map(function ($service) {
            return $service->title .
                " {$service->mark} &#9733;";
        })->implode(",\n");

        $this->reply($services);
    }

    public function hello(): void
    {
        $this->reply('aaaa');
    }
}
