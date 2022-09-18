<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Orders\Domain\Enums\PaymentMethod;
use Src\Orders\Domain\Enums\PaymentStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_name' => 'john doe',
            'customer_email' => 'johndoe@gmail.com',
            'customer_mobile' => '12345678',
            'status' => PaymentStatus::CREATED,
            'product_reference' => 'RF-001',
            'product_description' => 'product description',
            'total' => '185000',
            'payment_method' => PaymentMethod::PLACE_TO_PAY
        ];
    }
}
