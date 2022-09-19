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
                    'customer_name',
                    'customer_email',
                    'customer_mobile',
                    'product_reference',
                    'product_description',
                    'total',
                    'status',
                    'process_url'
                ]
            ]);
        
    }

    // validate request
    
}