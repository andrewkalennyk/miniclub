<?php

namespace App\Models;

/**
 * App\Models\ServiceFeature
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_en
 * @property int $is_active
 * @property int|null $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceFeature whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceFeature extends BaseModel
{
    protected $table = 'service_features';
    protected $fillable = [];

}
