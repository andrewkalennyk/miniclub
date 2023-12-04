<?php

namespace App\Telegram;

use App\Models\SecretSantaApplyForm;
use App\Telegram\Traits\ClubsTrait;
use App\Telegram\Traits\EventsTrait;
use App\Telegram\Traits\ManualsTrait;
use App\Telegram\Traits\PromotionTrait;
use App\Telegram\Traits\ServiceTrait;
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

        $this->chat
            ->markdown("Заявок - {$santas->count()}\n{$list}")
            ->send();
    }

    public function test()
    {
        $this->chat->action(ChatActions::TYPING)->send();

        $this->chat
            ->html(
                '
                <b>bold</b>, <strong>bold</strong>
<i>italic</i>, <em>italic</em>
<u>underline</u>, <ins>underline</ins>
<s>strikethrough</s>, <strike>strikethrough</strike>, <del>strikethrough</del>
<span class="tg-spoiler">spoiler</span>, <tg-spoiler>spoiler</tg-spoiler>
<b>bold <i>italic bold <s>italic bold strikethrough <span class="tg-spoiler">italic bold strikethrough spoiler</span></s> <u>underline italic bold</u></i> bold</b>
<a href="http://www.example.com/">inline URL</a>
<a href="tg://user?id=123456789">inline mention of a user</a>
<tg-emoji emoji-id="5368324170671202286">👍</tg-emoji>
<code>inline fixed-width code</code>
<pre>pre-formatted fixed-width code block</pre>
<pre><code class="language-python">pre-formatted fixed-width code block written in the Python programming language</code></pre>
'

            )
            ->send();
    }

}
