<?php

namespace Src\Orders\Application\UseCases;

use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Contracts\UseCases\CreateOrderContract;
use Src\Orders\Domain\Order;

class CreateOrder implements CreateOrderContract
{
    public function __construct(
        private OrderRepositoryContract $orderRepository
    ) {
    }

    public function handler(array $orderRequest): Order
    {
        $order = new Order(
            id: 0,
            customerName: $orderRequest['customer']['name'],
            customerEmail: $orderRequest['customer']['email'],
            customerMobile: $orderRequest['customer']['mobile'],
            productReference: $orderRequest['product']['reference'],
            productDescription: $orderRequest['product']['description'],
            total: $orderRequest['product']['amount']
        );

        return $this->orderRepository->save($order);
    }
}
