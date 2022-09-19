<?php

namespace Src\Payments\Domain\Dto;

class TransactionResponseDTO
{
    private string $requestId;
    private string $processUrl;
    private bool $status;

    public function toArray(): array
    {
        return [
            'request_id' => $this->requestId,
            'process_url' => $this->processUrl,
            'status' => $this->status
        ];
    }

    /**
     * Get the value of requestId
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }

    /**
     * Set the value of requestId
     */
    public function setRequestId(string $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * Get the value of processUrl
     */
    public function getProcessUrl(): string
    {
        return $this->processUrl;
    }

    /**
     * Set the value of processUrl
     */
    public function setProcessUrl(string $processUrl): self
    {
        $this->processUrl = $processUrl;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
