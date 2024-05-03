<?php

namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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
                'message_thread_id' => '65',
                'chat_id' => '-1002105223469',
                'parse_mode' => 'HTML',
                'text' => $this->formMessage($message)
            ]
        ]);
    }

    public function sendKyivMessage(string $message): bool
    {
        $client = new Client();

        try {
            $client->request('POST', $this->getApiUrl(), [
                'json' => [
                    'chat_id' => '-1001422187907',
                    'parse_mode' => 'HTML',
                    'text' => $this->formMessage($message)
                ]
            ]);
        } catch (GuzzleException $e) {
            \Log::info($e->getMessage());
            return false;
        }

        return true;
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

    protected function formbMessage(string $message): string
    {
        return "
            🎉 Корисний Факт:  🎉
🔍  <b> ".$message." </b>
🌞 Гарного дня!";
    }


}
