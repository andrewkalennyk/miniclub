<?php

namespace App\Models;

/**
 * App\Models\ReviewUser
 *
 * @property int $id
 * @property string $name
 * @property string|null $picture
 * @property string|null $social_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser whereSocialName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReviewUser extends BaseModel
{
    protected $table = 'review_users';
    protected $fillable = [];

}
