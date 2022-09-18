<?php

namespace Src\Payments\Domain\Contracts\UseCases;

use Src\Orders\Domain\Order;

interface SendTransactionContract {
    public function handler(Order $order): bool;
}