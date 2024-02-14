<?php

namespace App\Models;

/**
 * App\Models\ServiceType
 *
 * @property int $id
 * @property string $title
 * @property string $title_en
 * @property string $type
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceType extends BaseModel
{
    protected $table = 'service_types';
    protected $fillable = [];

    public function isActiveTabClass($isFirst = false): string
    {
        if (request()->get('type') == $this->type || (!request()->has('type') && $isFirst)) {
            return 'btn-secondary';
        }
        return '';
    }
}
