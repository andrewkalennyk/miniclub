<?php

namespace App\Models;

/**
 * App\Models\Propose
 *
 * @property int $id
 * @property string|null $social_name
 * @property string|null $proposition
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Propose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Propose query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Propose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propose whereProposition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propose whereSocialName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propose whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Propose extends BaseModel
{
    protected $table = 'propositions';

    protected $fillable = [
        'social_name',
        'proposition'
    ];
}
