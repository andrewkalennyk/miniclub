<?php

namespace App\Models;

use App\Models\Traits\OtherImageTrait;
use Carbon\Carbon;
use Illuminate\Support\Str;
class FastEvent extends BaseModel
{
    protected $table = 'fast_events';
    protected $fillable = [
        'title','responsible', 'short_description', 'slug','date', 'google_map', 'time'
    ];

    use OtherImageTrait;

    public function users()
    {
        return $this->hasMany(FastEventUser::class, 'fast_event_id');
    }

    public function getDate()
    {
        $date = strtotime($this->date);

        return date('d', $date).'.'.date('m', $date).'.'.date('Y', $date);
    }

    public function getTitleDate()
    {
        return $this->title . ' ' . $this->getDate();
    }

    public static function scopeSlug($query, string $slug)
    {
        return $query->where('slug', $slug);
    }

    public static function scopeDate($query,)
    {
        return $query->where('date', '>=', Carbon::now()->format('Y-m-d'));
    }

    public static function scopeId($query, int $id)
    {
        return $query->where('id', $id);
    }

    public function getUrl()
    {
        return route('fast-event', [$this->slug, $this->id]);
    }

    public function createApply($data): self
    {
        $data['slug'] = Str::slug(request('title'));
        $data['responsible'] =  str_replace(['https://t.me/','@'], '', $data['responsible']);

        return self::create($data);
    }
}
