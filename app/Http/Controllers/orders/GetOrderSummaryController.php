<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Orders\Domain\Contracts\UseCases\GetOrderSummaryContract;

class GetOrderSummaryController extends Controller
{
    public function __construct(
        private GetOrderSummaryContract $getOrderSummary
    ) {
    }

    public function Handler(string $orderID): JsonResponse
    {
        try {
            $order = $this->getOrderSummary->handler($orderID);
            return response()->json(['data' => $order]);
        } catch (\Throwable $th) {
            return response()->json();
        }
    }
}
