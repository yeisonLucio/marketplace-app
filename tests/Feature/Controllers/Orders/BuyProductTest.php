<?php

namespace Test\Feature\Controllers\Orders;

use Src\Orders\Domain\Enums\PaymentStatus;
use Tests\TestCase;

class BuyProductTest extends TestCase
{

    private string $path = 'api/v1.0/orders/buy-product';


    protected function setUp(): void
    {
        parent::setUp();
        
    }
    
    /** @test */
    public function shouldBuyProductSuccessfully()
    {
        $body = [
            'paymentMethod' => 'placetopay',
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
                    'payment_method',
                    'status'
                ]
            ]);
        
    }

    // validate request
    
}