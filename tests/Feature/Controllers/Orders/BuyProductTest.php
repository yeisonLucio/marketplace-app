<?php

namespace Test\Feature\Controllers\Orders;

use Tests\TestCase;

class BuyProductTest extends TestCase
{

    private string $path = 'api/v1.0/orders/buy-product';
    
    /** @test */
    public function shouldBuyProductSuccessfully()
    {
        $body = [
            'product' => [
                'reference' => 'random_ref',
                'description' => 'description',
                'amount' => '185000'
            ],
            'customer' => [
                'name' => 'john doe',
                'email' => 'johndoe@gmail.com',
                'mobile' => '123456789'
            ]
        ];

        $this->postJson($this->path, $body)
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
            ]);
        
    }
    
}