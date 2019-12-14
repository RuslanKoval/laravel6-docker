<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @property $title
 * @property $parent_id
 * @property $description
 * @property $slug
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
}
