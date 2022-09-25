<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\orders\PayOrderRequest;
use Illuminate\Http\JsonResponse;
use Src\Orders\Domain\Contracts\UseCases\PayOrderUseCaseContract;
use Src\Payments\Domain\Dto\TransactionDTO;
use Symfony\Component\HttpFoundation\Response;

class PayOrderController extends Controller
{
    public function __construct(
        private PayOrderUseCaseContract $payOrderUseCase
    ) {
    }

    public function handler(PayOrderRequest $request): JsonResponse
    {
        try {
            $transactionDto = new TransactionDTO();
            $transactionDto->setOrderId($request->orderId)
                ->setIpAddress($request->ip())
                ->setUserAgent($request->server('HTTP_USER_AGENT'))
                ->setReturnUrl($request->returnUrl);

            $result = $this->payOrderUseCase->handler($transactionDto);

            return response()->json([
                'data' => [
                    'processUrl' => $result
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
