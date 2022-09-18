<?php

namespace App\Repositories;

use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;
use Src\Payments\Domain\Transaction;

class PlaceToPayRepository implements PaymentGatewayRepositoryContract{

    public function sendTransaction(Transaction $transaction): Transaction
    {
        return new Transaction();
    }

    public function getTransaction(int $transactionID): Transaction
    {
        return new Transaction();
    }
}
