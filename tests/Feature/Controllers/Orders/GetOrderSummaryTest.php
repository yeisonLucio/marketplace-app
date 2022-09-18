<?php

namespace Test\Feature\Controllers\Orders;

use App\Models\Order;
use Tests\TestCase;

class GetOrderSummaryTest extends TestCase
{
    private $path = 'api/v1.0/orders/get-order-summary/%s';

    /** @test */
    public function shouldReturnOrderAccordingToOrderId()
    {
        $order = Order::factory()->create();

        $path  = sprintf($this->path, $order->id);

        $this->getJson($path)
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'customer_name',
                    'customer_email',
                    'customer_mobile',
                    'product_reference',
                    'product_description',
                    'total',
                    'payment_method',
                    'status'
                ]
            ])
            ->assertJsonPath('data.id', $order->id)
            ->assertJsonFragment([
                'data' => [
                    'id' => $order->id,
                    'customer_name' => $order->customer_name,
                    'customer_email' => $order->customer_email,
                    'customer_mobile' => $order->customer_mobile,
                    'product_reference' => $order->product_reference,
                    'product_description' => $order->product_description,
                    'total' => $order->total,
                    'payment_method' => $order->payment_method,
                    'status' => $order->status
                ]
            ]);
    }

    /** @test */
    public function shouldReturnExceptionWhenTheOrderDoesNoExists()
    {
        
    }
    
    
}
