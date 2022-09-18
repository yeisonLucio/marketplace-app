<?php

namespace App\Providers;

use App\Repositories\EloquentOrderRepository;
use Illuminate\Support\ServiceProvider;
use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderRepositoryContract::class, EloquentOrderRepository::class);
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
