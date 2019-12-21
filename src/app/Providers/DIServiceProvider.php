<?php

namespace App\Providers;

use App\DI\FirstDI;
use App\DI\DiInterface;
use App\DI\ThirdDI;
use Illuminate\Support\ServiceProvider;

/**
 * Class DIServiceProvider
 */
class DIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(DiInterface::class, function ($app) {
            if (request()->has('credit')) {
                return new FirstDI('uan');
            } else {
                return new ThirdDI('uan');
            }
        });
    }
}
