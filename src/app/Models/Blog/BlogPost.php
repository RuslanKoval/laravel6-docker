<?php

namespace App\Models\Blog;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogPost
 * @property $category_id
 * @property $slug
 * @property $title
 * @property $excerpt
 * @property $content_raw
 * @property $content_html
 * @property $is_published
 * @property $user_id
 * @property $published_at
 */
class BlogPost extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    protected $fillable = [
        'category_id',
        'slug',
        'title',
        'excerpt',
        'content_raw',
        'is_published',
    ];

    protected $attributes = [
        'content_html' => '',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
