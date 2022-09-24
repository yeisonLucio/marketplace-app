<?php

namespace Test\Feature\Controllers\Orders;

use App\Models\Order;
use Tests\TestCase;

class GetOrderListTest extends TestCase
{
    private $url = 'api/v1.0/orders/get-all-orders';

    /** @test */
    public function shouldReturnAllOrders()
    {
        $orders = Order::factory(2)->create();

        $this->getJson($this->url)
            ->assertOk()
            ->assertJsonStructure([
                'data' => [[
                    'id',
                    'customerName',
                    'customerEmail',
                    'customerMobile',
                    'productReference',
                    'productDescription',
                    'total',
                    'processUrl',
                    'requestId',
                    'status',
                ]]
            ])
            ->assertJsonCount($orders->count(), 'data')
            ->assertJsonPath('data.0.id', $orders->last()->id)
            ->assertJsonPath('data.1.id', $orders->first()->id);
    }
}
