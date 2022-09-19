<?php

namespace App\Repositories;

use App\Helpers\PlaceToPayHelper;
use Illuminate\Support\Facades\Http;
use Src\Orders\Domain\Exceptions\TransactionFailed;
use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;
use Src\Payments\Domain\Dto\TransactionDTO;
use Src\Payments\Domain\Dto\TransactionResponseDTO;

class PlaceToPayRepository implements PaymentGatewayRepositoryContract
{
    public function __construct(private PlaceToPayHelper $helper)
    {
    }

    public function sendTransaction(TransactionDTO $transactionDTO): TransactionResponseDTO
    {
        $returnUrl = route('getOrderSummary', ['orderId' => $transactionDTO->getOrderId()]);

        $transactionDTO->setLogin($this->helper->getLogin())
            ->setTranKey($this->helper->getTranKey())
            ->setNonce($this->helper->getNonce())
            ->setSeed($this->helper->getSeed())
            ->setReturnUrl($returnUrl);

        $result = Http::withHeaders(['Content-Type' => 'application/json'])
            ->post(
                config('paymentGateways.placeToPay.services.sendTransaction'),
                $transactionDTO->toArray()
            );

        $response = json_decode($result->body(), true);

        if ($response['status']['status'] != 'OK') {
            throw new TransactionFailed($response['status']['message']);
        }

        $transactionResponseDTO = new TransactionResponseDTO();
        $transactionResponseDTO->setProcessUrl($response['processUrl'])
            ->setRequestId($response['requestId'])
            ->setStatus(true);

        return $transactionResponseDTO;
    }

    public function getTransaction(string $requestId): TransactionResponseDTO
    {
        $response = [];
        $transactionResponseDTO = new TransactionResponseDTO();
        $transactionResponseDTO->setProcessUrl($response['processUrl'])
            ->setRequestId($response['requestId'])
            ->setStatus(true);

        return $transactionResponseDTO;
    }
}
