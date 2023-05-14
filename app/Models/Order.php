<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_mobile',
        'product_reference',
        'product_description',
        'total',
        'status',
        'payment_method',
        'request_id',
        'process_url'
    ];

}
