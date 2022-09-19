<?php

namespace App\Repositories;

use App\Models\Order;
use Iterator;
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

    public function update(OrderDomain $order): bool
    {
        return Order::findOrFail($order->getId())
            ->update($order->toArray());
    }

    public function getAllOrders(): mixed
    {
        return Order::all();
    }
}
