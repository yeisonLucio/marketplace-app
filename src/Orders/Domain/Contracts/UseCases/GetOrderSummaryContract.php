<?php

namespace Src\Orders\Domain\Contracts\UseCases;

use Src\Orders\Domain\Exceptions\OrderNotFound;
use Src\Orders\Domain\Order;

interface GetOrderSummaryContract
{

    /**
     * @throws OrderNotFound
     */
    public function handler(int $orderID): ?Order;
}
