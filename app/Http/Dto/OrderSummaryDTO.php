<?php

namespace App\Http\Dto;

class OrderSummaryDTO
{
    public string $id;
    public string $customer_name;
    public string $customer_email;
    public string $customer_mobile;
    public string $product_reference;
    public string $product_description;
    public string $total;
    public string $status;
    public string $process_url;

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
            'status' => $this->status,
            'process_url' =>  $this->process_url
        ];
    }

    public static function fromArray(array $data): self
    {
        $orderDTO = new self();
        $orderDTO->map($data);

        return $orderDTO;
    }

    public function map(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
