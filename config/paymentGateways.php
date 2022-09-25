<?php

return [
    'placeToPay' => [
        'login' => env('PLACETOPAY_LOGIN', ''),
        'secretKey' => env('PLACETOPAY_SECRET_KEY', ''),
        'services' => [
            'sendTransaction' => env('PLACETOPAY_URL', '') . '/session',
            'getTransaction' => env('PLACETOPAY_URL', '') . '/session/{requestId}'
        ]
    ]
];