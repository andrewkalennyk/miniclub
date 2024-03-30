<?php

namespace App\Models;

use GuzzleHttp\Client;

class TelegramCharityBot
{
    protected string $apiUrl = "https://api.telegram.org/bot%u/sendMessage";

    public function getApiUrl(): string
    {
        return str_replace('%u', env('CHARITY_BOT_TOKEN'), $this->apiUrl);
    }

    public function sendMessage(array $data)
    {
        $client = new Client();

        $client->request('POST', $this->getApiUrl(), [
            'json' => [
                'message_thread_id' => '2',
                'chat_id' => '-1001806069709',
                'parse_mode' => 'HTML',
                'text' => $this->formMessage($data)
            ]
        ]);
    }

    protected function formMessage(array $data = []): string
    {
        return "
            📌 <b>Назва</b>: " . ($data['title'] ?? '') ."
👤 <b>Кому?</b>:  " . ($data['whom'] ?? '') ."
🤔 <b>Що?</b>: " . ($data['what'] ?? '') . "
✅ <b>Щоб шо?</b>:  " . ($data['for_what'] ?? '') ."
🖋 <b>Автор</b>:  " . ($data['author'] ?? '') ."
🔗 <b>Посилання</b>:  " . ($data['url'] ?? '') ."
📄 <b>Короткий опис</b>:  " . ($data['short_description'] ?? '') ."
        ";
    }


}
