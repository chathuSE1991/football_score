<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Interfaces\BaseEloquentRepositoryInterface;

use App\Repositories\BaseEloquentRepository;



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
