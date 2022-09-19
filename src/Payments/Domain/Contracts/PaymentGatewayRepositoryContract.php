<?php

namespace Src\Payments\Domain\Contracts;

use Src\Orders\Domain\Exceptions\TransactionFailed;
use Src\Payments\Domain\Dto\TransactionDTO;
use Src\Payments\Domain\Dto\TransactionResponseDTO;

interface PaymentGatewayRepositoryContract {

    /**
     * @throws TransactionFailed
     */
    public function sendTransaction(TransactionDTO $transactionDTO): TransactionResponseDTO;
    
    public function getTransaction(string $requestId): TransactionResponseDTO;
}