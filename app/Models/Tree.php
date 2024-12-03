<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Vis\Builder\Tree as TreeBuilder;

/**
 * App\Models\Tree
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int $lft
 * @property int $rgt
 * @property int|null $depth
 * @property string $title
 * @property string|null $description
 * @property string $slug
 * @property string $template
 * @property string|null $picture
 * @property string|null $additional_pictures
 * @property int $is_active
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property int|null $is_show_in_menu
 * @property int|null $is_show_in_footer_menu
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection<int, Tree> $children
 * @property-read int|null $children_count
 * @property-read Tree|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Venturecraft\Revisionable\Revision> $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree active()
 * @method static \Kalnoy\Nestedset\Collection<int, static> all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection<int, static> get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree isMenu()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree isMenuFooter()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree priorityAsc()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree slug($slug)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereAdditionalPictures($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereDepth($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereDescription($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereIsActive($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereIsShowInFooterMenu($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereIsShowInMenu($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree wherePicture($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereSeoDescription($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereSeoKeywords($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereSeoTitle($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereSlug($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereTemplate($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereTitle($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Tree withoutRoot()
 * @mixin \Eloquent
 */
class Tree extends TreeBuilder
{

    protected $fillable = [
        'seo_title',
        'seo_description'
    ];

    public static function getFirstDepthNodes()
    {
        return self::where('depth', '1')->get();
    }

    // end getFirstDepthNodes

    public function scopeActive($query)
    {
        return $query->where('is_active', '1');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    // end scopeActive

    /*
     * show in head menu
     * @param $query object
     * @return object
     */
    public function scopeIsMenu($query)
    {
        return $query->where('is_show_in_menu', 1)->where('is_active', '1')->orderBy('lft', 'asc');
    }

    // end scopeActive

    /*
     * show in footer menu
     * @param $query object
     * @return object
     */
    public function scopeIsMenuFooter($query)
    {
        return $query->where('is_show_in_footer_menu', 1)->where('is_active', '1')->orderBy('lft', 'asc');
    }

    // end scopeActive

    public function scopePriorityAsc($query)
    {
        return $query->orderBy('lft', 'asc');
    }

    // end scopeMain

    public function getDate()
    {
        return Util::getDate($this->created_at);
    }

    // end getDate

    //url page
    public function getUrl()
    {
        return geturl(parent::getUrl(), App::getLocale());
    }

    public function checkActiveMenu()
    {
        $pathUrl = str_replace(Request::root().'/', '', $this->getUrl());

        //if main page
        if ($this->id == 1 && $this->slug == '/') {
            return true;
        } else {
            if (Request::is($pathUrl) || Request::is($pathUrl.'/*')) {
                return true;
            }
        }
    }
}
