<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class PlaceToPayHelper
{
    private string $originalNonce;

    public function getLogin(): string
    {
        return config('paymentGateways.placeToPay.login');
    }

    public function getNonce(): string
    {
        return base64_encode($this->getOriginalNonce());
    }

    public function getOriginalNonce(): string
    {
        if (! isset($this->originalNonce)) {
            $this->originalNonce = Str::random(20);
        }

        return $this->originalNonce;
    }

    public function getSeed(): string
    {
        return now()->toIso8601String();
    }

    public function getTranKey(): string
    {
        $secretKey = config('paymentGateways.placeToPay.secretKey');
        $res = sha1($this->getOriginalNonce() . $this->getSeed() . $secretKey, true);
        $tranKey = base64_encode($res);

        return $tranKey;
    }
}
