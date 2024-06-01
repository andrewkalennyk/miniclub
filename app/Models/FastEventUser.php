<?php

namespace App\Models;


use Illuminate\Support\Str;

class FastEventUser extends BaseModel
{
    protected $table = 'fast_events_users';
    protected $fillable = [
        'fast_event_id','user'
    ];

    public function scopeByUserEvent($query, $user, $eventId)
    {
        return $query->where('user', $user)->where('fast_event_id', $eventId);
    }

    public function createApply($data): self
    {
        $data['user'] = str_replace(['https://t.me/','@'], '', $data['user']);
        return self::create($data);
    }

    public function deleteApply($data): void
    {
        $data['user'] = str_replace(['https://t.me/','@'], '', $data['user']);
        self::where('fast_event_id' , $data['fast_event_id'])
            ->where('user', $data['user'])
            ->delete();
    }

    public function getUrl()
    {
        return "https://t.me/$this->user";
    }

}
