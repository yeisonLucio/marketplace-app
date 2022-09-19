<?php

namespace Tests\Unit\UseCases\Orders;

use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Contracts\UseCases\CreateOrderContract;
use Src\Orders\Domain\Enums\PaymentMethod;
use Src\Orders\Domain\Order;
use Tests\TestCase;


class CreateOrderSummaryTest extends TestCase 
{

    /** @test */
    public function shouldCreateOrderSuccessfullyAccordingToRequest()
    {
        $order = $this->createFakeOrder();

        $request = [
            'product' => [
                'reference' => $order->getProductReference(),
                'description' => $order->getProductDescription(),
                'amount' => $order->getTotal()
            ],
            'customer' => [
                'name' => $order->getCustomerName(),
                'email' => $order->getCustomerEmail(),
                'mobile' => $order->getCustomerMobile()
            ]
        ];

        $this->mock(OrderRepositoryContract::class)
            ->shouldReceive('save')
            ->withAnyArgs()
            ->once()
            ->andReturn($order);

        /** @var CreateOrderContract */
        $useCase = app(CreateOrderContract::class);

        $result = $useCase->handler($request);

        $this->assertEquals($order->getId(), $result->getId());
    }
    
}