<?php

namespace Tests\Unit\Repositories\Orders;

use App\Models\Order;
use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Enums\PaymentMethod;
use Src\Orders\Domain\Order as DomainOrder;
use Tests\TestCase;

class OrdersRepositoryTest extends TestCase {

    private OrderRepositoryContract $repository;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->repository = app(OrderRepositoryContract::class);
    }
    
    /** @test */
    public function shouldSaveOrderSuccessfully()
    {
        $order = Order::factory()->make();

        $orderDomain = new DomainOrder(
            id: 0,
            customer_name: $order->customer_name,
            customer_email: $order->customer_email,
            customer_mobile: $order->customer_mobile,
            product_reference: $order->product_reference,
            product_description: $order->product_description,
            total: $order->total,
            payment_method: $order->payment_method
        );
       
        $result = $this->repository->save($orderDomain);
        
        $orderDomain->setId($result->getId());
        $this->assertEquals($result, $orderDomain);
    }


    /** @test */
    public function shouldReturnOrderAccordingToId()
    {
        $order = Order::factory()->create();

        $result = $this->repository->getById($order->id);

        $this->assertNotNull($result);
        $this->assertEquals($order->id, $result->id);
    }

     /** @test */
     public function shouldReturnNullWhenOrderDoesNotExists()
     {
         $result = $this->repository->getById(0);
 
         $this->assertNull($result);
     }
     
    

}

