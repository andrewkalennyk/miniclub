<?php

namespace App\Models;


use Illuminate\Support\Str;

class FastEventUser extends BaseModel
{
    protected $table = 'fast_events_users';
    protected $fillable = [
        'fast_event_id','user'
    ];

    public function createApply($data): self
    {
        $data['user'] = str_replace(['https://t.me/','@'], '', $data['user']);
        return self::create($data);
    }

    public function getUrl()
    {
        return "https://t.me/$this->user";
    }

}
