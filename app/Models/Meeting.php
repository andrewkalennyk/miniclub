<?php

namespace App\Models;


class Meeting extends BaseModel
{
    protected $table = 'meetings';

    protected $fillable = [
        'date',
        'time',
        'description',
        'social_name',
        'map_point'
    ];

    public function createApply($data): bool
    {
        return (bool) self::create($data);
    }
}
