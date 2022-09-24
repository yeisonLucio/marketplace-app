<?php

namespace App\Repositories;

use App\Models\Order;
use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Order as OrderDomain;

class EloquentOrderRepository implements OrderRepositoryContract
{

    public function save(OrderDomain $order): OrderDomain
    {
        $orderModel = new Order;
        $orderModel->customer_name = $order->getCustomerName();
        $orderModel->customer_email = $order->getCustomerEmail();
        $orderModel->customer_mobile = $order->getCustomerMobile();
        $orderModel->product_reference = $order->getProductReference();
        $orderModel->product_description = $order->getProductDescription();
        $orderModel->total = $order->getTotal();
        $orderModel->save();

        $order->setId($orderModel->id);

        return $order;
    }

    public function getById(int $orderID): ?OrderDomain
    {
        $order = Order::find($orderID);
        return $order ? OrderDomain::fromArray($order->toArray()) : null;
    }

    public function update(OrderDomain $order): bool
    {
        return Order::findOrFail($order->getId())
            ->update([
                'status' => $order->getStatus()->value,
                'process_url' => $order->getProcessUrl(),
                'request_id' => $order->getRequestId()
            ]);
    }

    public function getAllOrders(): array
    {
        return Order::select(
            'id',
            'customer_name as customerName',
            'customer_email as customerEmail',
            'customer_mobile as customerMobile',
            'product_reference as productReference',
            'product_description as productDescription',
            'total',
            'process_url as processUrl',
            'request_id as requestId',
            'status'
        )
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
    }
}
