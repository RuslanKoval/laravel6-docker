<?php

namespace App\Repositories;

use App\Models\Blog\BlogPost as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepository
 */
class BlogPostRepository  extends CoreRepository
{

    /**
     * получить модель по id
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @param int $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = 10)
    {

        $result = $this->startConditions()
            ->with(['user', 'category'])
//            ->with([
//                'category' => function (BelongsTo $query) {
//                    $query->select(['id', 'title']);
//                },
//                'user'
//            ])
//            ->with([
//                'category:id,title',
//                'user:id,name',
//            ])
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
