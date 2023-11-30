<?php

namespace App\Telegram;

use App\Models\CarGroup;
use App\Models\CarInstruction;
use App\Models\LocalClub;
use App\Models\SecretSantaApplyForm;
use App\Models\Service;
use App\Models\TelegramEvent;
use App\Models\TelegramNumberUser;
use Carbon\Carbon;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Facades\Telegraph;
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

   /* public function cl(): void
    {
        $clubs = LocalClub::with('city')->active()->get()->map(function ($club) {
            $link = $club->hasUrl() ? " <a href='{$club->getUrl()}'>Лінк</a>" : '';
            return $club->city->title . $link;
        })->implode("\n");



        $this->reply($clubs);
    }*/

    public function cl(): void
    {
        $clubs = LocalClub::with('city')->active()->get()->pluck('city.title', 'id');

        $buttons = collect([]);
        foreach ($clubs as $id => $club) {
            $buttons->push(Button::make($club)->action('cll')->param('id', $id));
        }

        $buttons = $buttons->chunk(2);

        $keyboard = Keyboard::make();

        foreach ($buttons as $row) {
            $keyboard->row($row->toArray());
        }

        $this->chat
            ->message('Виберіть місто')
            ->keyboard($keyboard)
            ->send();
    }

    public function cll():void
    {
        $club = LocalClub::with('city')->find($this->data->get('id'));

        $keyboard = Keyboard::make()
            ->when(empty($club->telegram_url), fn(Keyboard $keyboard) => $keyboard->button('Telegram')->action('cclr')->param('id', $club->id))
            ->when(!empty($club->telegram_url), fn(Keyboard $keyboard) => $keyboard->button('Telegram')->url($club->telegram_url))
            ->when(!empty($club->url), fn(Keyboard $keyboard) => $keyboard->button('Instagram')->url($club->url));

        $this->chat->edit($this->messageId)->message('Лінки на ресурси')->send();

        $this->chat
            ->edit($this->messageId)
            ->replaceKeyboard($this->messageId, $keyboard)
            ->send();
    }

    public function cclr()
    {
        $club = LocalClub::with('city')->find($this->data->get('id'));

        $this->chat->edit($this->messageId)->message(
            'Якщо хочеш в чат, напиши будь ласка (тут може бути адмін чату)'//$this->responsible
        )->send();
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

    public function ne(string $name):void
    {
        $event = TelegramEvent::create(
            [
                'title' => $name,
                'event_at' => Carbon::now()->format('Y-m-d')
            ]
        );

        $this->chat->message("{$event->title} - {$event->id} Доданий")->send();
    }

    public function ec(string $number):void //event car
    {
        $str = explode('-', $number);

        $carNumber = $str[0];
        $eventId = $str[1];

        $telegramNumberUser = TelegramNumberUser::firstOrCreate(['number' => $carNumber]);

        $telegramNumberUser->telegram_events()->sync([$eventId]);

        $this->chat->message("{$carNumber} Прив'язаний до івенту {$eventId}")->send();
    }

    public function mnl()
    {
        $this->chat
            ->message('Виберіть маркет для скачування')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('PlayMarket')->url('https://play.google.com/store/apps/details?id=com.mini.driversguide.row&hl=ru&pli=1'),
                Button::make('AppStore')->url('https://apps.apple.com/gb/app/mini-drivers-guide/id834510424')
            ]))
            ->send();
    }

    public function mdls()
    {
        $this->chat
            ->photo(public_path('/images/mini_lineup.jpg'))
            ->send();
    }

    public function sc() //santa_count
    {
        $santas = SecretSantaApplyForm::all();

        $list = $santas->pluck('social_name')->implode("\n");

        $this->chat
            ->message("Заявок - {$santas->count()}\n{$list}")
            ->send();
    }

    public function mnls()
    {
        $groups = CarGroup::whereHas('car_instructions')->active()->pluck('title','id');

        $buttons = collect([]);
        foreach ($groups as $id => $group) {
            $buttons->push(Button::make($group)->action('mnlsg')->param('id', $id));
        }

        $this->chat->message('Виберіть кузов')
            ->keyboard(Keyboard::make()->buttons($buttons->toArray())->chunk(3))
            ->send();
    }

    public function mnlsg()
    {
        $carGroup = CarGroup::find($this->data->get('id'));

        $instructions = CarInstruction::with('car_group')
            ->where('car_group_id','=', $carGroup->id)
            ->pluck('title','file');

        $buttons = collect([]);
        foreach ($instructions as $file => $title) {
            $buttons->push(Button::make($title)->url(asset($file)));
        }

        $this->chat->edit($this->messageId)->message('Інструкції для '. $carGroup->title)->send();

        $this->chat
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons($buttons->toArray()))
            ->send();
    }


    public function test()
    {
        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat->poll("What's your favourite programming language?")
            ->option('php')
            ->option('typescript')
            ->option('rust')
            ->allowMultipleAnswers()
            ->validUntil(now()->addMinutes(5))
            ->send();
    }

}
