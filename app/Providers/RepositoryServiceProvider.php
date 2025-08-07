<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Interfaces\BaseEloquentRepositoryInterface;
use App\Interfaces\Match\MatchRepositoryInterface;
use App\Repositories\BaseEloquentRepository;
use App\Repositories\Match\MatchRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseEloquentRepositoryInterface::class, BaseEloquentRepository::class);
         $this->app->bind(MatchRepositoryInterface::class, MatchRepository::class);

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
