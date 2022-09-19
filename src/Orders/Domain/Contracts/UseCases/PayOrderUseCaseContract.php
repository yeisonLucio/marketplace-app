<?php

namespace Src\Orders\Domain\Contracts\UseCases;

use Src\Orders\Domain\Exceptions\OrderNotFound;
use Src\Orders\Domain\Exceptions\PaymentGatewayFailed;
use Src\Orders\Domain\Exceptions\TransactionFailed;
use Src\Payments\Domain\Dto\TransactionDTO;

interface PayOrderUseCaseContract {

    /**
     * @throws OrderNotFound
     * @throws TransactionFailed
     */
    public function handler(TransactionDTO $transactionDTO): string;
}