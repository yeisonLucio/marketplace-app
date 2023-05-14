<?php

namespace App\Http\Requests\orders;

use Illuminate\Foundation\Http\FormRequest;

class BuyProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'customer.name' => 'required|max:80',
            'customer.email' => 'required|max:120',
            'customer.mobile' => 'required|max:40',
            'product.reference' => 'required|max:50',
            'product.description' => 'required|max:150',
            'product.amount' => 'required|max:50',
        ];
    }
}
