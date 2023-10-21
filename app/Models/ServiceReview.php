<?php

namespace App\Models;

use App\Models\Traits\OtherImageTrait;

/**
 * App\Models\ServiceReview
 *
 * @property int $id
 * @property int $review_user_id
 * @property int $service_id
 * @property int $mark
 * @property string|null $comment
 * @property string|null $pictures
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ReviewUser $review_user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @property-read \App\Models\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview serviceHas(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview serviceId(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview whereReviewUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceReview whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return strlen($this->comment) > 360;
    }

    public function getComment(): string
    {
        if ($this->isHugeComment()) {
            return mb_substr($this->comment, 0, 354 - 3) . '...';
        }

        return $this->comment;
    }

    public function getUrl()
    {
        return route('review', [$this->service->slug, $this->id]);
    }

}
