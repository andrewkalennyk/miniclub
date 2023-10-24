<?php

namespace App\Models;

class Review extends BaseModel
{
    protected $table = 'reviews_apply';

    protected $fillable = [
        'service_id',
        'social_name',
        'name',
        'rating',
        'message',
    ];

    public function review_user()
    {
        return $this->belongsTo(ReviewUser::class, 'review_user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }


    public function createReview($data): bool
    {
        $data['rating'] = $data['ratingRating'];

        return (bool) self::create($data);
    }
}
