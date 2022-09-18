<?php

namespace Src\Orders\Domain\Enums;

enum PaymentMethod: string {
    case PLACE_TO_PAY = 'placetopay';
}