<?php

namespace Test\Feature\Controllers\Orders;

use App\Models\Order;
use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;
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

        $this->mock(PaymentGatewayRepositoryContract::class)
            ->shouldReceive('getStatusTransaction')
            ->with($order->request_id)
            ->once()
            ->andReturn("PENDING");

        $this->getJson($path)
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'customerName',
                    'customerEmail',
                    'customerMobile',
                    'productReference',
                    'productDescription',
                    'total',
                    'status',
                    'processUrl'
                ]
            ])
            ->assertJsonFragment([
                'data' => [
                    'id' => $order->id,
                    'customerName' => $order->customer_name,
                    'customerEmail' => $order->customer_email,
                    'customerMobile' => $order->customer_mobile,
                    'productReference' => $order->product_reference,
                    'productDescription' => $order->product_description,
                    'total' => $order->total,
                    'status' => $order->status,
                    'processUrl' => $order->process_url,
                    'requestId' => $order->request_id
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
