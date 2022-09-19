<?php

namespace Test\Feature\Controllers\Orders;

use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetOrderSummaryTest extends TestCase
{
    private $path = 'api/v1.0/orders/get-order-summary/%s';

    /** @test */
    public function shouldReturnOrderAccordingToOrderId()
    {
        $order = Order::factory()->create();

        $path = sprintf($this->path, $order->id);

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
                    'status',
                    'process_url'
                ]
            ])
            ->assertJsonFragment([
                'data' => [
                    'id' => (string) $order->id,
                    'customer_name' => $order->customer_name,
                    'customer_email' => $order->customer_email,
                    'customer_mobile' => $order->customer_mobile,
                    'product_reference' => $order->product_reference,
                    'product_description' => $order->product_description,
                    'total' => $order->total,
                    'status' => $order->status,
                    'process_url' => $order->process_url
                ]
            ]);
    }

    /** @test */
    public function shouldReturnErrorNotFoundWhenTheOrderDoesNoExists()
    {
        $path = sprintf($this->path, 0);

        $this->getJson($path)
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(['error'])
            ->assertJsonFragment(['error' => 'Order not found']);
    }
}
