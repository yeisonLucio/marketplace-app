<?php

namespace Src\Orders\Application\UseCases;


use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Contracts\UseCases\PayOrderUseCaseContract;
use Src\Orders\Domain\Exceptions\OrderNotFound;
use Src\Orders\Domain\Exceptions\TransactionFailed;
use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;
use Src\Payments\Domain\Dto\TransactionDTO;

class PayOrderUseCase implements PayOrderUseCaseContract
{
    public function __construct(
        private OrderRepositoryContract $orderRepository,
        private PaymentGatewayRepositoryContract $paymentGateway
    ) {
    }

    public function handler(TransactionDTO $transactionDTO): string
    {
        $order = $this->orderRepository->getById((int) $transactionDTO->getOrderId());

        if (!$order) {
            throw new OrderNotFound("Order not found");
        }

        $transactionDTO
            ->setCustomerName($order->getCustomerName())
            ->setCustomerEmail($order->getCustomerEmail())
            ->setCustomerMobile($order->getCustomerMobile())
            ->setProductReference($order->getProductReference())
            ->setProductDescription($order->getProductDescription())
            ->setProductAmount($order->getTotal());

        $result = $this->paymentGateway->sendTransaction($transactionDTO);

        if (!$result->getStatus()) {
            throw new TransactionFailed("Transaction failed");
        }

        $order->setProcessUrl($result->getProcessUrl())
            ->setRequestId($result->getRequestId());

        $this->orderRepository->Update($order);

        return $result->getProcessUrl();
    }
}
