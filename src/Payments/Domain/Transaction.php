<?php 

namespace Src\Payments\Domain;

use Src\Orders\Domain\Order;

class Transaction {
    private int $id;
    private Order $order;
}