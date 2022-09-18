<?php

namespace Src\Payments\Domain\Contracts;

use Src\Payments\Domain\Transaction;

interface PaymentGatewayRepositoryContract {
    public function sendTransaction(Transaction $transaction): Transaction;
    public function getTransaction(int $transactionID): Transaction;
}