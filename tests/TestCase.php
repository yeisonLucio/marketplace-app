<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Src\Orders\Domain\Enums\PaymentStatus;
use Src\Orders\Domain\Order;
use Src\Payments\Domain\Dto\TransactionDTO;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected function createFakeOrder(): Order
    {
        return new Order(
            0,
            'john doe',
            'johndoe@gmail.com',
            '1122132',
            '123',
            'fake',
            '12333',
            PaymentStatus::CREATED,
            '12',
            'http://test.com'
        );
    }

    protected function createFakeTransactionDto(): TransactionDTO
    {
        return TransactionDTO::fromArray([
            'customerName' => 'yeison',
            'customerEmail' => 'yeison@gmail.com',
            'customerMobile' => '123456',
            'productReference' => 'fake-ref',
            'productDescription' => 'fake',
            'productAmount' => '10000',
            'ipAddress' => '1.2.3',
            'returnUrl' => 'fake',
            'userAgent' => 'fake',
            'paymentMethod' => 'fake',
            'login' => '',
            'tranKey' => '',
            'nonce' => '',
            'seed' => '',
            'orderId' => 'fake',
            'expiration' => ''
        ]);
    }
}
