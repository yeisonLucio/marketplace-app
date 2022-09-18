<?php

namespace App\Http\Requests\orders;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Src\Orders\Domain\Enums\PaymentMethod;

class BuyProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer.name' => 'required|max:80',
            'customer.email' => 'required|max:120',
            'customer.mobile' => 'required|max:40',
            'product.reference' => 'required|max:50',
            'product.description' => 'required|max:150',
            'product.amount' => 'required|max:50',
            'paymentMethod' => ['required', new Enum(PaymentMethod::class)]
        ];
    }
}
