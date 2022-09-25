<?php

namespace App\Helpers;

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
            $this->originalNonce = bin2hex(random_bytes(16));
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

        $tranKey = base64_encode(
            sha1($this->getOriginalNonce() . $this->getSeed() . $secretKey, true)
        );

        return $tranKey;
    }
}
