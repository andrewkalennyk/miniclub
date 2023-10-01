<?php
namespace App\Telegram;

use App\Models\Service;
use DefStudio\Telegraph\Facades\Telegraph;
use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Handler extends WebhookHandler
{

    public function hello(): void
    {
        $this->reply('hello world');
    }

    public function nm($number): void
    {
        $user = $this->message->from();

        DB::table('telegram_number_user')->insert([
            'number' => $number,
            'username' => $user->username(),
            'chatId' => $user->id(),
        ]);

        $this->reply($number . ' are in the list!');
    }

    public function fa($number): void
    {

       /* $user = $this->message->from();*/
        $numberUser = DB::table('telegram_number_user')->where('number', $number)->first();

        $chat = TelegraphChat::find(1);
        Log::info(json_encode($chat));
        Log::info(json_encode($numberUser));
        $chat->message('You get Fa Fa from ')->send();

        $this->reply('Fa fa was send!');
    }

    public function sto(): void
    {
        $services = Service::active()->limit(5)->get()->map(function ($service) {
            return $service->title . "({$service->address})";
        })->implode(",\n");

        $this->reply($services);
    }

    public function wtf(): void
    {
        //$this->reply('Fa fa was send!');
        $this->reply(json_encode($this->message->from()->toArray()));
    }
}
