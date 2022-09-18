<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Orders\Application\UseCases\CreateOrder;
use Src\Orders\Application\UseCases\GetOrderSummary;
use Src\Orders\Domain\Contracts\UseCases\CreateOrderContract;
use Src\Orders\Domain\Contracts\UseCases\GetOrderSummaryContract;

class UseCaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateOrderContract::class, CreateOrder::class);
        $this->app->bind(GetOrderSummaryContract::class, GetOrderSummary::class);
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
