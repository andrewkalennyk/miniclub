<?php

namespace App\Models;

use App\Models\Traits\OtherImageTrait;

class Event extends BaseModel
{
    protected $table = 'events';
    protected $fillable = [];

    use OtherImageTrait;

    public function scopeOrderEventDate($query)
    {
        return $query->orderBy('event_date', 'desc');
    }

    public function getDate()
    {
        $date = strtotime($this->event_date);

        return date('d', $date).'.'.date('m', $date).'.'.date('Y', $date);
    }

    public static function scopeSlug($query, string $slug)
    {
        return $query->where('slug', $slug);
    }

    public static function scopeId($query, int $id)
    {
        return $query->where('id', $id);
    }

    public function getUrl()
    {
        return route('event', [$this->slug, $this->id]);
    }
}
