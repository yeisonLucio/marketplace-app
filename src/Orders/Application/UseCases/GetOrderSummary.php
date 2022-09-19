<?php

namespace Src\Orders\Application\UseCases;

use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Contracts\UseCases\GetOrderSummaryContract;
use Src\Orders\Domain\Enums\PaymentStatus;
use Src\Orders\Domain\Exceptions\OrderNotFound;
use Src\Orders\Domain\Order;
use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;

class GetOrderSummary implements GetOrderSummaryContract
{

    public function __construct(
        private OrderRepositoryContract $orderRepository,
        private PaymentGatewayRepositoryContract $paymentGateway
    ) {
    }

    /**
     * @inheritdoc
     */
    public function handler(int $orderID): ?Order
    {
        $order = $this->orderRepository->getById($orderID);

        if (!$order) {
            throw new OrderNotFound("Order not found");
        }

        if($order->getStatus() == PaymentStatus::PAYED){
            return $order;
        }

        $result = $this->paymentGateway->getTransaction($order->getRequestId());

        if ($result->getStatus()){
            
        }

        return $order;
    }
}
