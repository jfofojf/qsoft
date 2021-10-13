<?php

namespace App\Providers;

use App\Repository\ArticlesRepository;
use App\Repository\ArticlesRepositoryContract;
use App\Repository\CarsRepository;
use App\Repository\CarsRepositoryContract;
use App\Repository\TagsRepository;
use App\Repository\TagsRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ArticlesRepositoryContract::class, ArticlesRepository::class);
        $this->app->singleton(CarsRepositoryContract::class, CarsRepository::class);
        $this->app->singleton(TagsRepositoryContract::class, TagsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
