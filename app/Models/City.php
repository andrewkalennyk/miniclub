<?php

namespace App\Models;

use App\Models\Traits\OtherImageTrait;

/**
 * App\Models\City
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class City extends BaseModel
{
    protected $table = 'city';
    protected $fillable = [];

}
