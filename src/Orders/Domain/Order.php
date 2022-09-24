<?php

namespace Src\Orders\Domain;

use Src\Orders\Domain\Enums\PaymentStatus;

class Order
{

    public function __construct(
        private int $id,
        private string $customerName,
        private string $customerEmail,
        private string $customerMobile,
        private string $productReference,
        private string $productDescription,
        private string $total,
        private PaymentStatus $status = PaymentStatus::CREATED,
        private string $requestId = '',
        private string $processUrl = ''
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            customerName: $data['customer_name'],
            customerEmail: $data['customer_email'],
            customerMobile: $data['customer_mobile'],
            productReference: $data['product_reference'],
            productDescription: $data['product_description'],
            total: $data['total'],
            status: PaymentStatus::tryFrom($data['status']),
            requestId: $data['request_id'],
            processUrl: $data['process_url']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'customerName' => $this->customerName,
            'customerEmail' => $this->customerEmail,
            'customerMobile' => $this->customerMobile,
            'productReference' => $this->productReference,
            'productDescription' => $this->productDescription,
            'total' => $this->total,
            'status' => $this->status->value,
            'processUrl' => $this->processUrl,
            'requestId' => $this->requestId
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
        return $this->customerName;
    }

    public function setCustomerName(string $customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function setCustomerEmail(string $customerEmail): self
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    public function getCustomerMobile(): string
    {
        return $this->customerMobile;
    }

    public function setCustomerMobile(string $customerMobile): self
    {
        $this->customerMobile = $customerMobile;

        return $this;
    }

    public function getProductReference(): string
    {
        return $this->productReference;
    }

    public function setProductReference(string $productReference): self
    {
        $this->productReference = $productReference;

        return $this;
    }

    public function getProductDescription(): string
    {
        return $this->productDescription;
    }

    public function setProductDescription(string $productDescription): self
    {
        $this->productDescription = $productDescription;

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
        return $this->requestId;
    }

    public function setRequestId(string $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getProcessUrl(): string
    {
        return $this->processUrl;
    }

    public function setProcessUrl(string $processUrl): self
    {
        $this->processUrl = $processUrl;

        return $this;
    }
}
