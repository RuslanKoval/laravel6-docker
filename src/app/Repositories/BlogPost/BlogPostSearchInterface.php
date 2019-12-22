<?php

namespace App\Repositories\BlogPost;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogPostSearchInterface
 */
interface BlogPostSearchInterface
{
    public function search(string $query = '');
}
