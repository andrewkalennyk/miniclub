<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TelegramNumberUser extends BaseModel
{
    protected $table = 'telegram_number_user';

    protected $fillable = [
        'number',
        'username',
        'chatId',
        'birth_day',
    ];

    public function telegram_events(): BelongsToMany
    {
        return $this->belongsToMany(TelegramEvent::class);
    }

    public function getUserName(): string
    {
        return '@' . $this->username;
    }

    public function getBirthDayUserName(): string
    {
        return $this->getUserName() . "(". $this->birth_day .")";
    }
}
