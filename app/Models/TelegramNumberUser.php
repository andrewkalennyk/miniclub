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
    ];

    public function telegram_events(): BelongsToMany
    {
        return $this->belongsToMany(TelegramEvent::class);
    }
}
