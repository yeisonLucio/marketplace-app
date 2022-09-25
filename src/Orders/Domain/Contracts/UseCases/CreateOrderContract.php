<?php

namespace Src\Orders\Domain\Contracts\UseCases;

use Src\Orders\Domain\Order;

interface CreateOrderContract
{
    public function handler(array $orderRequest): Order;
}
