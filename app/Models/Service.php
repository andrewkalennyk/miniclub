<?php

namespace App\Models;

use Illuminate\Support\Collection;

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

}