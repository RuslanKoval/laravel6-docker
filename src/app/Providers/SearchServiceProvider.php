<?php

namespace App\Providers;
use App\Repositories\BlogPost\BlogPostElasticSearchRepository;
use App\Repositories\BlogPost\BlogPostEloquentSearchRepository;
use App\Repositories\BlogPost\BlogPostSearchInterface;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;
/**
 * Class SearchServiceProvider
 */
class SearchServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BlogPostSearchInterface::class, function ($app) {
            if (! config('services.search.enabled')) {
                return new BlogPostEloquentSearchRepository();
            }
            return new BlogPostElasticSearchRepository(
                $app->make(Client::class)
            );
        });

        $this->bindSearchClient();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }

}
