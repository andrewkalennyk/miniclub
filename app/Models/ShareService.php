<?php

namespace App\Models;

class ShareService extends BaseModel
{
    protected $table = 'share_service_apply';

    protected $fillable = [
        'title',
        'url',
        'google_map',
        'service_type',
        'city_id',
        'social_name',
        'rating',
        'message',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function service_type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    public function createApply($data): bool
    {
        $data['rating'] = $data['ratingRating'];

        return (bool) self::create($data);
    }
}
