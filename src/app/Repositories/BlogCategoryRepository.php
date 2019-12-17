<?php

namespace App\Repositories;

use App\Models\Blog\BlogCategory as Model;

/**
 * Class BlogCategoryRepository
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * получить модель по id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * получить все категории
     */
    public function getCategoryList()
    {
        $columns = ['id', 'title'];
        $result = $this->startConditions()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * @param int $perPage
     *
     * @return mixed
     */
    public function getAllWithPaginate($perPage = 10)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()
            ->select($columns)
            ->with('parentCategory')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
