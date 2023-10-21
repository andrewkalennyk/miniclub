<?php

namespace App\Models;

use App\Models\Traits\OtherImageTrait;

/**
 * App\Models\LocalClub
 *
 * @property int $id
 * @property int $city_id
 * @property string|null $picture
 * @property string|null $url
 * @property string|null $responsible
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub whereResponsible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalClub whereUrl($value)
 * @mixin \Eloquent
 */
class LocalClub extends BaseModel
{
    protected $table = 'local_club';
    protected $fillable = [];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function hasUrl(): bool
    {
        return !empty($this->url);
    }

    public function getUrl(): string|null
    {
        return $this->url;
    }

    public function getExtraUrl()
    {
        if ($this->url) {
            return $this->url;
        }

        if ($this->responsive) {
            return $this->responsive;
        }

        return 'javascript:void(0)';
    }

}
