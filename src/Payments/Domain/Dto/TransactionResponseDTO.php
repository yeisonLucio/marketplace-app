<?php

namespace Src\Payments\Domain\Dto;

class TransactionResponseDTO
{
    private string $requestId;
    private string $processUrl;
    private bool $requestStatus;

    public function toArray(): array
    {
        return [
            'request_id' => $this->requestId,
            'process_url' => $this->processUrl,
            'requestStatus' => $this->requestStatus
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
     * Get the value of RequestStatus
     */
    public function getRequestStatus(): bool
    {
        return $this->requestStatus;
    }

    /**
     * Set the value of RequestStatus
     */
    public function setRequestStatus(bool $requestStatus): self
    {
        $this->requestStatus = $requestStatus;

        return $this;
    }
}
