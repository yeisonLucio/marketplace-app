<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Orders\Application\UseCases\CreateOrder;
use Src\Orders\Application\UseCases\GetOrderSummary;
use Src\Orders\Application\UseCases\PayOrderUseCase;
use Src\Orders\Domain\Contracts\UseCases\CreateOrderContract;
use Src\Orders\Domain\Contracts\UseCases\GetOrderSummaryContract;
use Src\Orders\Domain\Contracts\UseCases\PayOrderUseCaseContract;

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
        $this->app->bind(PayOrderUseCaseContract::class, PayOrderUseCase::class);
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
