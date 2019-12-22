<?php

namespace App\Repositories\BlogPost;

use App\Models\Blog\BlogPost;
use App\Repositories\CoreRepository;
use Elasticsearch\Client;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogPostEloquentSearch
 */
class BlogPostElasticSearchRepository extends CoreRepository implements BlogPostSearchInterface
{
    /** @var \Elasticsearch\Client */
    private $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
        parent::__construct();
    }

    /**
     * @param string $query
     *
     * @return Collection
     */
    public function search(string $query = '')
    {
        $items = $this->searchOnElasticsearch($query);
        return $this->buildCollection($items);
    }

    /**
     * @param string $query
     *
     * @return array
     */
    private function searchOnElasticsearch(string $query = ''): array
    {
        $model = $this->startConditions();
        $items = $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['title^5', 'excerpt', 'content_raw'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);
        return $items;
    }

    /**
     * @param array $items
     *
     * @return Collection
     */
    private function buildCollection(array $items)
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');

        return $this->startConditions()
            ->with(['user', 'category'])
            ->whereIn('id', $ids);
    }

    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return BlogPost::class;
    }
}
