<?php

namespace App\Models;

use App\Models\Traits\OtherImageTrait;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $title_en
 * @property string|null $description
 * @property string|null $description_en
 * @property string|null $picture
 * @property string|null $additional_pictures
 * @property string|null $event_date
 * @property int $is_active
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|Event id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event orderEventDate()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereAdditionalPictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
