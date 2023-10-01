<?php

namespace App\Models;

use App\Models\Traits\OtherImageTrait;

class ServiceReview extends BaseModel
{
    use OtherImageTrait;

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

    public function scopeServiceHas($query, string $slug)
    {
        return $query->whereHas('service', function ($subQuery) use ($slug) {
            $subQuery->where('slug', '=', $slug);
        });
    }

    public function scopeServiceId($query, int $id)
    {
        return $query->where('service_id', $id);
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

    public function isHugeComment(): bool
    {
        return strlen($this->comment) > 120;
    }

    public function getComment(): string
    {
        if ($this->isHugeComment()) {
            return mb_substr($this->comment, 0, 217 - 3) . '...';
        }

        return $this->comment;
    }

    public function getUrl()
    {
        return route('review', [$this->service->slug, $this->id]);
    }

}
