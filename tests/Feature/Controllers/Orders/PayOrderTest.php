<?php

namespace Test\Feature\Controllers\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PayOrderTest extends TestCase
{
    private string $path = 'api/v1.0/orders/pay-order';

    /** @test */
    public function shouldSendATransactionAccordingToOrderId()
    {
        $urlFake = 'fake-url';
        config()->set('paymentGateways.placeToPay.services.sendTransaction', $urlFake);

        $orderDB = Order::factory()->create();
        $processUrl = 'url-fake';

        $response = [
            'status' => [
                'status' => 'OK',
                'message' => 'La petición se ha procesado correctamente',
            ],
            'requestId' => '61643',
            'processUrl' => $processUrl
        ];

        Http::fake([$urlFake => Http::response($response)]);

        $this->postJson($this->path, ['orderId' => $orderDB->id])
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'processUrl'
                ]
            ])->assertJsonPath('data.processUrl', $processUrl);
    }
}
