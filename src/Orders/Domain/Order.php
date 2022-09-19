<?php

namespace Src\Orders\Domain;

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
        private PaymentStatus $status = PaymentStatus::CREATED,
        private string $request_id = '',
        private string $process_url = ''
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            customer_name: $data['customer_name'],
            customer_email: $data['customer_email'],
            customer_mobile: $data['customer_mobile'],
            product_reference: $data['product_reference'],
            product_description: $data['product_description'],
            total: $data['total'],
            status: PaymentStatus::tryFrom($data['status']),
            request_id: $data['request_id'],
            process_url: $data['process_url']
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
            'status' => $this->status->value,
            'process_url' => $this->process_url,
            'request_id' => $this->request_id
        ];
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

    public function getRequestId()
    {
        return $this->request_id;
    }

    public function setRequestId(string $requestId): self
    {
        $this->request_id = $requestId;

        return $this;
    }

    public function getProcessUrl(): string
    {
        return $this->process_url;
    }

    public function setProcessUrl(string $processUrl): self
    {
        $this->process_url = $processUrl;

        return $this;
    }
}
