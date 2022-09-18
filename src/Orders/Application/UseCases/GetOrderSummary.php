<?php

namespace Src\Orders\Application\UseCases;

use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Contracts\UseCases\GetOrderSummaryContract;
use Src\Orders\Domain\Exceptions\OrderNotFound;
use Src\Orders\Domain\Order;

class GetOrderSummary implements GetOrderSummaryContract
{

    public function __construct(
        private OrderRepositoryContract $orderRepository
    ) {
    }

    /**
     * @inheritdoc
     */
    public function handler(int $orderID): ?Order
    {
        $result = $this->orderRepository->getById($orderID);

        if (!$result) {
            throw new OrderNotFound("Order not found");
        }

        return $result;
    }
}
