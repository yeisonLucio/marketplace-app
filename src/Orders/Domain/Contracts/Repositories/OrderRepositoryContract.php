<?php

namespace Src\Orders\Domain\Contracts\Repositories;

use Src\Orders\Domain\Order;

interface OrderRepositoryContract
{
    public function save(Order $order): Order;

    public function getById(int $orderID): ?Order;

    public function update(Order $order): bool;

    public function getAllOrders(): mixed;
}
