<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * App\Models\Faq
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_en
 * @property string $text
 * @property string|null $text_en
 * @property int $is_active
 * @property int $is_main
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel active()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel id(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel orderPriority()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel pageInfo($slug, $id)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel slug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTextEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Faq extends BaseModel
{
    protected $table = 'faq_items';
    protected $fillable = [];


}
