<?php

namespace Tests\Unit\Repositories\Orders;

use App\Helpers\PlaceToPayHelper;
use App\Repositories\PlaceToPayRepository;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Mockery;
use Src\Orders\Domain\Exceptions\TransactionFailed;
use Src\Payments\Domain\Contracts\PaymentGatewayRepositoryContract;
use Src\Payments\Domain\Dto\TransactionDTO;
use Src\Payments\Domain\Dto\TransactionResponseDTO;
use Tests\TestCase;

class PlaceToPayRepositoryTest extends TestCase
{
    private PlaceToPayHelper $helperMock;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->helperMock = Mockery::mock(PlaceToPayHelper::class);
        $this->helperMock->shouldReceive('getLogin')
            ->withNoArgs()
            ->once()
            ->andReturn('')
            ->shouldReceive('getNonce')
            ->withNoArgs()
            ->once()
            ->andReturn('')
            ->shouldReceive('getSeed')
            ->withNoArgs()
            ->once()
            ->andReturn('')
            ->shouldReceive('getTranKey')
            ->withNoArgs()
            ->once()
            ->andReturn('');
    }
    
    /** @test */
    public function shouldReturnThatTheTransactionWasSuccessful()
    {
        $urlFake = 'fake-url';
        config()->set('paymentGateways.placeToPay.services.sendTransaction', $urlFake);

        $transactionDTO = $this->createFakeTransactionDto();

        $response = [
            'status' => [
                'status' => 'OK',
                'message' => 'La petición se ha procesado correctamente',
            ],
            'requestId' => '61643',
            'processUrl' => 'url-fake'
        ];

        Http::fake([$urlFake => Http::response($response)]);

        Http::withHeaders(['Content-Type' => 'application/json'])
            ->post($urlFake, $transactionDTO->toArray());

        $responseDTO = new TransactionResponseDTO();

        $responseDTO->setProcessUrl($response['processUrl'])
            ->setStatus(true)
            ->setRequestId($response['requestId']);

        $repo = new PlaceToPayRepository($this->helperMock);

        $result = $repo->sendTransaction($transactionDTO);

        $this->assertEquals($responseDTO->toArray(), $result->toArray());

        Http::assertSent(function (Request $request) use ($transactionDTO, $urlFake) {
            return $request->data() == $transactionDTO->toArray() &&
                $request->url() == $urlFake;
        });
    }

    /** @test */
    public function shouldGenerateExceptionWhenTransactionFail()
    {
        $urlFake = 'fake-url';
        config()->set('paymentGateways.placeToPay.services.sendTransaction', $urlFake);

        $transactionDTO = $this->createFakeTransactionDto();

        $response = [
            'status' => [
                'status' => 'FAILED',
                'message' => 'Peticion fallida',
            ],
        ];

        Http::fake([$urlFake => Http::response($response)]);

        Http::withHeaders(['Content-Type' => 'application/json'])
            ->post($urlFake, $transactionDTO->toArray());

        $this->expectException(TransactionFailed::class);
        $this->expectExceptionMessage($response['status']['message']);

        $repo = new PlaceToPayRepository($this->helperMock);

        $repo->sendTransaction($transactionDTO);

    }
    
}
