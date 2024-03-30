<?php

namespace App\Models;

class DonateForm extends BaseModel
{
    protected $table = 'charity_apply_form';

    protected $fillable = [
        'title',
        'whom',
        'what',
        'for_what',
        'url',
        'author',
        'short_description',
        'is_active',
    ];

    public function createApply($data): bool
    {
        $status = (bool) self::create($data);

        if ($status) {
            (new TelegramCharityBot())->sendMessage($data);
        }
        return $status;
    }
}
