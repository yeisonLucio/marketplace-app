<?php

namespace Src\Orders\Domain\Contracts\Repositories;

use Src\Orders\Domain\Order;

interface OrderRepositoryContract
{
    public function save(Order $order): Order;
    public function getById(int $orderID): ?Order;
}
