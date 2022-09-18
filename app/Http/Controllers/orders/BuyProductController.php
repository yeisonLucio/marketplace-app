<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\BuyProductRequest;
use Illuminate\Http\JsonResponse;
use Src\Orders\Domain\Contracts\UseCases\CreateOrderUseCaseContract;

class BuyProductController extends Controller
{
    public function __construct(
        private CreateOrderUseCaseContract $createOrderUseCase
    ){
        
    }

    public function handler(BuyProductRequest $request): JsonResponse
    {
        try {
            $result = $this->createOrderUseCase->handler($request->all());
            return response()->json(['data' => $result->toArray()]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }
}
