<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\NewsRepository;
use App\Services\ArticleService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(NewsRepository::class, function ($app) {
            return new NewsRepository();
        });

        $this->app->singleton(ArticleService::class, function ($app) {
            return new ArticleService($app->make(NewsRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
