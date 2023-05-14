<?php

namespace App\Http\Requests\orders;

use Illuminate\Foundation\Http\FormRequest;

class PayOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'orderId' => 'required',
            'returnUrl' => 'required'
        ];
    }

}
