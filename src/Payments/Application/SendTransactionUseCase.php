<?php

namespace Src\Payments\Application;

use Src\Orders\Domain\Order;
use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;
use Src\Payments\Domain\Contracts\UseCases\SendTransactionContract;
use Src\Payments\Domain\Transaction;

class SendTransactionUseCase implements SendTransactionContract
{
    public function __construct(
        private PaymentGatewayRepositoryContract $paymentGateway
    ) {
    }

    public function handler(Order $order): bool
    {
        $transaction = new Transaction();

        $result = $this->paymentGateway->sendTransaction($transaction);

        return false;
    }
}
