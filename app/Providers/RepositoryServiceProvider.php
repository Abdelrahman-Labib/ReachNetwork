<?php

namespace App\Providers;

use App\Repository\AdvertisementRepositoryInterface;
use App\Repository\AdvertiserRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\Eloquent\AdvertisementRepository;
use App\Repository\Eloquent\AdvertiserRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\TagRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\TagRepositoryInterface;
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
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(AdvertiserRepositoryInterface::class, AdvertiserRepository::class);
        $this->app->bind(AdvertisementRepositoryInterface::class, AdvertisementRepository::class);
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
