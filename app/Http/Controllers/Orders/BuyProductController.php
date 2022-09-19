<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\BuyProductRequest;
use Illuminate\Http\JsonResponse;
use Src\Orders\Domain\Contracts\UseCases\CreateOrderContract;

class BuyProductController extends Controller
{
    public function __construct(
        private CreateOrderContract $createOrderUseCase
    ) {
    }

    public function handler(BuyProductRequest $request): JsonResponse
    {
        try {
            $result = $this->createOrderUseCase->handler($request->all());
            return response()->json(['data' => $result->toArray()]);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['error' => $th->getMessage()]);
        }
    }
}
