<?php

namespace App\Providers;

use App\Helpers\PlaceToPayHelper;
use App\Repositories\EloquentOrderRepository;
use App\Repositories\PlaceToPayRepository;
use Illuminate\Support\ServiceProvider;
use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;

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

        $this->app->bind(PaymentGatewayRepositoryContract::class, function () {
            return new PlaceToPayRepository(new PlaceToPayHelper());
        });
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
