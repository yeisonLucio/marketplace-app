<?php

namespace Src\Orders\Domain\Enums;

enum PaymentStatus: string {
    case CREATED = 'created';
    case PAYED = 'payed';
    case REJECTED = 'rejected';
}