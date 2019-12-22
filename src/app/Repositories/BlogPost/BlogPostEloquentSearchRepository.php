<?php

namespace App\Repositories\BlogPost;

use App\Models\Blog\BlogPost;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogPostEloquentSearch
 */
class BlogPostEloquentSearchRepository extends CoreRepository implements BlogPostSearchInterface
{
    public function search(string $query = ''): Collection
    {

        return $this->startConditions()::query()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content_raw', 'like', "%{$query}%")
            ->get();
    }

    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return BlogPost::class;
    }
}
