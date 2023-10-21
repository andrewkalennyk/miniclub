<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * App\Models\Service
 *
 * @property int $id
 * @property int|null $city_id
 * @property int|null $service_type_id
 * @property string $title
 * @property string $title_en
 * @property string|null $logo
 * @property string|null $number
 * @property string|null $site_url
 * @property string|null $google_url
 * @property string|null $expert_decision
 * @property float|null $mark
 * @property string|null $contact_person
 * @property string|null $address
 * @property string|null $address_en
 * @property string|null $slug
 * @property int $is_active
 * @property int $is_show_main
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceFeature> $service_features
 * @property-read int|null $service_features_count
 * @property-read \App\Models\ServiceType|null $service_type
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Service isMain()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Service type(int $typeId)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereAddressEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereExpertDecision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereGoogleUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereIsShowMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereServiceTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSiteUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends BaseModel
{
    protected $table = 'services';
    protected $fillable = [];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function service_type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    public function reviews()
    {
        return $this->hasMany(ServiceReview::class, 'service_id');
    }

    public function service_features()
    {
        return $this->belongsToMany(ServiceFeature::class, 'services_service_features');
    }

    public function scopeType($query, int $typeId)
    {
        return $query->where('service_type_id', $typeId);
    }

    public function scopeIsMain($query)
    {
        return $query->where('is_show_main', 1);
    }

    public function getUrl()
    {
        return route('service', [$this->slug, $this->id]);
    }

    public function getReviewStatistics(): Collection
    {
        $maxMark = 5;
        $statistics = collect([]);

        for ($i = 1; $i <= $maxMark; $i++) {
            $statistics->put($i, $this->reviews->where('mark', $i)->count());
        }

        return $statistics;
    }

    public function getReviewPercentage(int $currMark): string
    {
        if ($this->reviews->count() == 0) {
            return "(0%)";
        }

        $percentage = $currMark / $this->reviews->count() * 100;

        return "({$percentage}%)";
    }

    public function getExpertImageDecision(): string
    {
        return match ($this->expert_decision) {
            'like' => '/images/o-like.png',
            'dislike' => '/images/o-dislike.png',
            default => '',
        };
    }

    public function getExpertImageTitle(): string
    {
        return match ($this->expert_decision) {
            'like' => __t('Непогано'),
            'dislike' => __t('Щось не дуже'),
            default => '',
        };
    }

    public function getMark()
    {
        return $this->mark ?: 0;
    }
}
