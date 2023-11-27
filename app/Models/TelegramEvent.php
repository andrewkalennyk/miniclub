<?php

namespace App\Models;

class TelegramEvent extends BaseModel
{
    protected $table = 'telegram_events';

    protected $fillable = [
        'title',
        'event_at'
    ];
}
