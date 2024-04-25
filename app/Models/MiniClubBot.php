<?php

namespace App\Models;

use GuzzleHttp\Client;

class MiniClubBot
{
    protected string $apiUrl = "https://api.telegram.org/bot%u/sendMessage";

    public function getApiUrl(): string
    {
        return str_replace('%u', env('MINI_CLUB_BOT_TOKEN'), $this->apiUrl);
    }

    public function sendMessage(string $message)
    {
        $client = new Client();

        $client->request('POST', $this->getApiUrl(), [
            'json' => [
                /*'message_thread_id' => '2',*/
                'chat_id' => '491295600',
                'parse_mode' => 'HTML',
                'text' => $this->formMessage($message)
            ]
        ]);
    }

    protected function formMessage(string $message): string
    {
        return "
            🎉 Цікавий Факт:  🎉
🔍  <b> ".$message." </b>
🌞 Гарного дня!";
    }

    protected function formClubMessage(string $message): string
    {
        return "
            🎉 Корисний Факт:  🎉
🔍  <b> ".$message." </b>
🌞 Гарного дня!";
    }


}
