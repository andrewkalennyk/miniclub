<?php

namespace App\Telegram;

use App\Models\SecretSantaApplyForm;
use App\Telegram\Traits\BirthdayTrait;
use App\Telegram\Traits\ClubsTrait;
use App\Telegram\Traits\EventsSchemaTrait;
use App\Telegram\Traits\EventsTrait;
use App\Telegram\Traits\ManualsTrait;
use App\Telegram\Traits\PromotionTrait;
use App\Telegram\Traits\ServiceTrait;
use App\Telegram\Traits\StickersTrait;
use App\Telegram\Traits\VinTrait;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Handler extends WebhookHandler
{
    use ServiceTrait;
    use ClubsTrait;
    use EventsTrait;
    use ManualsTrait;
    use PromotionTrait;
    use StickersTrait;
    use EventsSchemaTrait;
    use BirthdayTrait;
    use VinTrait;

    public function start(): void
    {
        $this->chat->message('Привіт, тебе вітає Бот який може допомогти знайти інформацію про міні! Тицяй в меню! Там всі доступні команди!')->send();
    }

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
        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat
            ->message("Заявок - {$santas->count()}\n{$list}")
            ->send();
    }

    public function test()
    {
        $this->chat->action(ChatActions::TYPING)->send();
        $this->chat->markdown("*Hello!*\n\nI'm here!")->send();

    /*$this->chat
        ->markdownV2("Кафе «Шовковиця» Київ Пропонує : *bold* \n- Шовковична 48 (центр)\n- Нижній вал 37 (поділ)")
        ->send();*/
    }

}
