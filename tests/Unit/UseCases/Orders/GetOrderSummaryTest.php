<?php

namespace Tests\Unit\UseCases\Orders;

use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Contracts\UseCases\GetOrderSummaryContract;
use Src\Orders\Domain\Exceptions\OrderNotFound;
use Tests\TestCase;

class GetOrderSummaryTest extends TestCase 
{
    /** @test */
    public function shouldReturnOrderSuccessfully()
    {
        $order = $this->createFakeOrder();
        
        $this->mock(OrderRepositoryContract::class)
            ->shouldReceive('getById')
            ->withArgs([$order->getId()])
            ->once()
            ->andReturn($order);

        /** @var GetOrderSummaryContract */
        $useCase = app(GetOrderSummaryContract::class);

        $result = $useCase->handler($order->getId());
        
        $this->assertNotNull($result);
        $this->assertEquals($order, $result);
    }

    /** @test */
    public function shouldGenerateExceptionWhenOrderDoesNotExists()
    {
        $this->mock(OrderRepositoryContract::class)
            ->shouldReceive('getById')
            ->withArgs([0])
            ->once()
            ->andReturn(null);

        /** @var GetOrderSummaryContract */
        $useCase = app(GetOrderSummaryContract::class);

        $this->expectException(OrderNotFound::class);
        $this->expectExceptionMessage('Order not found');

        $useCase->handler(0);
    }
    
    
}