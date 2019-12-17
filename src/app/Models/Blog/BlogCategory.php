<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @property                   $title
 * @property                   $parent_id
 * @property                   $description
 * @property                   $slug
 * @property-read BlogCategory $parentCategory
 * @property-read string       $parentTitle
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'parent_id',
        'description',
        'slug'
    ];

    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * аксессор
     * вызывать parent_title или parentTitle
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Root'
                : '???');

        return $title;
    }

    /**
     * @param $value
     * аксессор
     * @return mixed
     */
    public function getTitleAttribute($value)
    {
        return $value;
    }

    /**
     * @param $value
     * мутатор
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
    }

    /**
     * @return bool
     */
    public function isRoot()
    {
        return $this->id === 1;
    }
}
