<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Dto\OrderSummaryDTO;
use Exception;
use Illuminate\Http\JsonResponse;
use Src\Orders\Domain\Contracts\UseCases\GetOrderSummaryContract;
use Src\Orders\Domain\Exceptions\OrderNotFound;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class GetOrderSummaryController extends Controller
{
    public function __construct(
        private GetOrderSummaryContract $getOrderSummary
    ) {
    }

    public function handler(string $orderID): JsonResponse
    {
        try {
            $order = $this->getOrderSummary->handler($orderID);

            return response()->json([
                'data' => OrderSummaryDTO::fromArray($order->toArray())->toArray()
            ]);
        } catch (OrderNotFound $e) {
            return response()->json(
                ['error' => $e->getMessage()],
                Response::HTTP_NOT_FOUND
            );
        } catch (Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
