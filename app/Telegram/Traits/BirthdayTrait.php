<?php

namespace App\Telegram\Traits;

use App\Models\TelegramNumberUser;
use Carbon\Carbon;

use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait BirthdayTrait
{
    public function bd():void
    {
        $telegramUser = TelegramNumberUser::where('chatId', $this->chat->chat_id)->first();
        \Log::info($telegramUser);

        $message = 'У вас не встановлено дня нардження!';
        $btn = 'Додати';


        if ($telegramUser && !empty($telegramUser->birth_day)) {
            $birthDay = Carbon::parse($telegramUser->birth_day)->format('d-m-Y');
            $message = "Ваш День Народження : " . $birthDay;
            $btn = "Змінити";
        }

        $this->chat->message($message)
            ->keyboard(Keyboard::make()->buttons(
                [
                    Button::make($btn)->action('bd_a'),
                ]
            ))
            ->send();
    }

    public function bd_m(): void
    {
        $months = collect([
            1 => "Січень",
            2 => "Лютий",
            3 => "Березень",
            4 => "Квітень",
            5 => "Травень",
            6 => "Червень",
            7 => "Липень",
            8 => "Серпень",
            9 => "Вересень",
            10 => "Жовтень",
            11 => "Листопад",
            12 => "Грудень",
        ]);


        $year = $this->data->get('year');
        $this->chat->storage()->set('year', $year);

        $months = $months->map(function (string $month, int $id) use ($year) {
            return Button::make($month)->action('bd_d')->param('month', $id);
        })
            ->toArray();


        $this->chat->action(ChatActions::TYPING)->send();

        $this->chat->edit($this->messageId)->message("Виберіть місяць в $year році!")->send();

        $this->chat->edit($this->messageId)
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons($months)->chunk(3))
            ->send();
    }

    public function bd_d(): void
    {
        $year = $this->chat->storage()->get('year');
        $month = $this->data->get('month');

        $startOfMonth = Carbon::create($year, $month, 1);

        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $datesInMonth = collect([]);

        while ($startOfMonth->lte($endOfMonth)) {
            $datesInMonth->push($startOfMonth->format('d-m-Y'));
            $startOfMonth->addDay();
        }

        $datesInMonth = $datesInMonth->map(function (string $date, int $id) use ($year) {
            return Button::make($date)->action('bd_f')->param('date', $date);
        })
            ->toArray();

        $this->chat->edit($this->messageId)->message("Виберіть день $month-го місяця $year року!")->send();

        $this->chat->edit($this->messageId)
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons($datesInMonth)->chunk(7))
            ->send();

    }

    public function bd_f(): void
    {
        $date = $this->data->get('date');

        $this->chat->edit($this->messageId)->message("Ваш день народження - $date?")->send();

        $this->chat->edit($this->messageId)
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons([
                Button::make('Так')->action('bd_s')->param('date', $date),
                Button::make('Ні')->action('bd_a')
            ]))
            ->send();

    }

    public function bd_a(): void
    {
        $date = Carbon::now();

        $endDate = $date->subYears(18)->format('Y');
        $startYear = $date->subYears(60)->format('Y');

        $years = collect([$startYear]);

        for ($year = $startYear; $year <= $endDate; $year++) {
            $years->push($year);
        }

        $years = $years->map(function (string $year, int $id) {
            return Button::make($year)->action('bd_m')->param('year', $year);
        })
            ->toArray();

        $this->chat->action(ChatActions::TYPING)->send();

        $this->chat->edit($this->messageId)->message("Виберіть рік народження!")->send();

        $this->chat->edit($this->messageId)
            ->replaceKeyboard($this->messageId, Keyboard::make()->buttons($years)->chunk(8))
            ->send();

    }

    public function bd_s():void
    {
        try {
            $userName = $this->chat->info()['username'];

            $telegramNumberUser = TelegramNumberUser::updateOrCreate(
                [
                    'chatId' => $this->chat->info()['id'],
                    'username'  => $userName,
                ],
                ['birth_day'  => Carbon::parse($this->data->get('date'))->toDate()]
            );

            $this->chat->edit($this->messageId)->message("Дякую $userName! Твій День Народження Збережено!")->send();
        } catch (\Exception $exception) {
            \Log::info($exception);
            $this->chat->edit($this->messageId)->message("Щось пішло не так!( Вибачте!")->send();
        }
        \Log::info($this->chat->info()['username']);
        \Log::info($this->chat->info()['id']);
    }
}
