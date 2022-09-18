<?php

namespace Src\Orders\Domain;

use DateTime;
use Src\Orders\Domain\Enums\PaymentMethod;
use Src\Orders\Domain\Enums\PaymentStatus;

class Order
{

    public function __construct(
        private int $id,
        private string $customer_name,
        private string $customer_email,
        private string $customer_mobile,
        private string $product_reference,
        private string $product_description,
        private string $total,
        private PaymentMethod $payment_method,
        private PaymentStatus $status = PaymentStatus::CREATED
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCustomerName(): string
    {
        return $this->customer_name;
    }

    public function setCustomerName(string $customer_name)
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    public function getCustomerEmail(): string
    {
        return $this->customer_email;
    }

    public function setCustomerEmail(string $customer_email): self
    {
        $this->customer_email = $customer_email;

        return $this;
    }

    public function getCustomerMobile(): string
    {
        return $this->customer_mobile;
    }

    public function setCustomerMobile(string $customer_mobile): self
    {
        $this->customer_mobile = $customer_mobile;

        return $this;
    }

    public function getProductReference(): string
    {
        return $this->product_reference;
    }

    public function setProductReference(string $product_reference): self
    {
        $this->product_reference = $product_reference;

        return $this;
    }

    public function getProductDescription(): string
    {
        return $this->product_description;
    }

    public function setProductDescription(string $product_description): self
    {
        $this->product_description = $product_description;

        return $this;
    }

    public function getTotal(): string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getStatus(): PaymentStatus
    {
        return $this->status;
    }

    public function setStatus(PaymentStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPaymentMethod(): PaymentMethod
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(PaymentMethod $payment_method): self
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    public static function fromArray(array $data): self
    {
        return new Order(
            id: $data['id'],
            customer_name: $data['customer_name'],
            customer_email: $data['customer_email'],
            customer_mobile: $data['customer_mobile'],
            product_reference: $data['product_reference'],
            product_description: $data['product_description'],
            total: $data['total'],
            payment_method: $data['payment_method'],
            status: $data['status']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'customer_mobile' => $this->customer_mobile,
            'product_reference' => $this->product_reference,
            'product_description' => $this->product_description,
            'total' => $this->total,
            'payment_method' => $this->payment_method,
            'status' => $this->status
        ];
    }
}
