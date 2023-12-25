<?php

namespace App\Models;

class AskForm extends BaseModel
{
    protected $table = 'ask_form';

    protected $fillable = [
        'proposition',
        'social_name',
        'is_anonymously',
        'is_answered',
        'answer',
    ];

    public function createApply($data): bool
    {
        return (bool) self::create($data);
    }
}
