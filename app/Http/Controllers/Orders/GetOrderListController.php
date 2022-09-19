<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;

class GetOrderListController extends Controller
{

    public function __construct(private OrderRepositoryContract $orderRepository)
    {
    }

    public function handler(): JsonResponse
    {
        $orders = $this->orderRepository->getAllOrders();

        return response()->json(['data' => $orders]);
    }
}
