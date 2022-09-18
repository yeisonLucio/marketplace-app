<?php

namespace Src\Orders\Application\UseCases;

use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Contracts\UseCases\CreateOrderContract;
use Src\Orders\Domain\Enums\PaymentMethod;
use Src\Orders\Domain\Order;

class CreateOrder implements CreateOrderContract {
    
    public function __construct(
        private OrderRepositoryContract $orderRepository
    ) { }

    public function handler(array $orderRequest): Order
    {
        $order = new Order(
            id: 0,
            customer_name: $orderRequest['customer']['name'], 
            customer_email: $orderRequest['customer']['email'],
            customer_mobile: $orderRequest['customer']['mobile'],
            product_reference: $orderRequest['product']['reference'],
            product_description: $orderRequest['product']['description'],
            total: $orderRequest['product']['amount'],
            payment_method: PaymentMethod::tryFrom($orderRequest['paymentMethod'])
        );
        
        return $this->orderRepository->save($order);
    }
}