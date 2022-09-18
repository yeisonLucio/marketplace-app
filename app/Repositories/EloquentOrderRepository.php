<?php

namespace App\Repositories;

use App\Models\Order;
use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Order as OrderDomain;

class EloquentOrderRepository implements OrderRepositoryContract
{

    public function save(OrderDomain $order): OrderDomain
    {
        $orderSaved = Order::create($order->toArray());
        return OrderDomain::fromArray($orderSaved->toArray());
    }

    public function getById(int $orderID): ?OrderDomain
    {
        $order = Order::find($orderID);
        return $order ? OrderDomain::fromArray($order->toArray()) : null;
    }
}
