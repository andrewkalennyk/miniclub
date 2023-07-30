<?php

namespace App\Models;

class ServiceReview extends BaseModel
{
    protected $table = 'service_reviews';
    protected $fillable = [];

    public function review_user()
    {
        return $this->belongsTo(ReviewUser::class, 'review_user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getReviewerPicture(): string
    {
        return $this->review_user->picture ?: '';
    }

    public function getReviewerName(): string
    {
        return $this->review_user->name ?: '';
    }

    public function getMark(): int
    {
        return $this->mark ?: 0;
    }

    public function getDate(): string
    {
        return date('d.m.Y', strtotime($this->created_at));
    }

}
