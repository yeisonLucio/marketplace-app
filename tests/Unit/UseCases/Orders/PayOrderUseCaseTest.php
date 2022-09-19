<?php

use Src\Orders\Domain\Contracts\Repositories\OrderRepositoryContract;
use Src\Orders\Domain\Contracts\UseCases\PayOrderUseCaseContract;
use Src\Orders\Domain\Exceptions\OrderNotFound;
use Src\Orders\Domain\Exceptions\TransactionFailed;
use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;
use Src\Payments\Domain\Dto\TransactionDTO;
use Src\Payments\Domain\Dto\TransactionResponseDTO;
use Tests\TestCase;

class PayOrderUseCaseTest extends TestCase
{
    /** @test */
    public function shouldSendTheTransactionSuccessfully()
    {
        $order = $this->createFakeOrder();
        $transactionDTO = new TransactionDTO();

        $transactionDTO->setOrderId($order->getId())
            ->setIpAddress('124')
            ->setUserAgent('fake');

        $transactionResponseDTO = new TransactionResponseDTO();
        $transactionResponseDTO->setProcessUrl('fake')
            ->setRequestId('123')
            ->setRequestStatus(true);

        $order->setProcessUrl($transactionResponseDTO->getProcessUrl())
            ->setRequestId($transactionResponseDTO->getRequestId());

        $this->mock(OrderRepositoryContract::class)
            ->shouldReceive('getById')
            ->with((int) $transactionDTO->getOrderId())
            ->once()
            ->andReturn($order)
            ->shouldReceive('update')
            ->with($order)
            ->once()
            ->andReturn(true);

        $this->mock(PaymentGatewayRepositoryContract::class)
            ->shouldReceive('sendTransaction')
            ->with($transactionDTO)
            ->once()
            ->andReturn($transactionResponseDTO);

        /** @var PayOrderUseCaseContract */
        $useCase = app(PayOrderUseCaseContract::class);

        $result = $useCase->handler($transactionDTO);

        $this->assertEquals($result, $transactionResponseDTO->getProcessUrl());
    }

    /** @test */
    public function shouldGenerateExceptionWhenSendTransactionFail()
    {
        $order = $this->createFakeOrder();
        $transactionDTO = new TransactionDTO();

        $transactionDTO->setOrderId($order->getId())
            ->setIpAddress('124')
            ->setUserAgent('fake');

        $transactionResponseDTO = new TransactionResponseDTO();
        $transactionResponseDTO->setProcessUrl('fake')
            ->setRequestId('123')
            ->setRequestStatus(false);

        $this->mock(OrderRepositoryContract::class)
            ->shouldReceive('getById')
            ->with((int) $transactionDTO->getOrderId())
            ->once()
            ->andReturn($order);

        $this->mock(PaymentGatewayRepositoryContract::class)
            ->shouldReceive('sendTransaction')
            ->with($transactionDTO)
            ->once()
            ->andReturn($transactionResponseDTO);

        /** @var PayOrderUseCaseContract */
        $useCase = app(PayOrderUseCaseContract::class);

        $this->expectException(TransactionFailed::class);
        $this->expectExceptionMessage('Transaction failed');

        $useCase->handler($transactionDTO);
    }

    /** @test */
    public function shouldGenerateExceptionWhenOrderNotFound()
    {
        $transactionDTO = $this->createFakeTransactionDto();

        $this->expectException(OrderNotFound::class);
        $this->expectExceptionMessage('Order not found');

        /** @var PayOrderUseCaseContract */
        $useCase = app(PayOrderUseCaseContract::class);

        $useCase->handler($transactionDTO);
    }
}
