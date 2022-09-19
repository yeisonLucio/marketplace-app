<?php

namespace Src\Payments\Domain\Dto;

class TransactionDTO
{
    private string $customerName;
    private string $customerEmail;
    private string $customerMobile;
    private string $productReference;
    private string $productDescription;
    private string $productAmount;
    private string $ipAddress;
    private string $returnUrl;
    private string $userAgent;
    private string $paymentMethod = '';
    private string $login;
    private string $tranKey;
    private string $nonce;
    private string $seed;
    private string $orderId;

    public static function fromArray(array $data): self
    {
        $object = new self();
        $object->map($data);

        return $object;
    }

    private function map(array $data): void
    {
        $this->customerName = $data['customerName'];
        $this->customerEmail = $data['customerEmail'];
        $this->customerMobile = $data['customerMobile'];
        $this->productReference = $data['productReference'];
        $this->productDescription = $data['productDescription'];
        $this->productAmount = $data['productAmount'];
        $this->ipAddress = $data['ipAddress'];
        $this->returnUrl = $data['returnUrl'];
        $this->userAgent = $data['userAgent'];
        $this->paymentMethod = $data['paymentMethod'];
        $this->login = $data['login'];
        $this->tranKey = $data['tranKey'];
        $this->nonce = $data['nonce'];
        $this->seed = $data['seed'];
        $this->orderId = $data['orderId'];
    }

    public function toArray(): array
    {
        $data = [
            'buyer' => [
                'name' => $this->customerName,
                'email' => $this->customerEmail,
                'mobile' => $this->customerMobile,
            ],
            'payment' => [
                'reference' => $this->productReference,
                'description' => $this->productDescription,
                'amount' => [
                    'total' => $this->productAmount
                ],
            ],
            'ipAddress' => $this->ipAddress,
            'returnUrl' => $this->returnUrl,
            'userAgent' => $this->userAgent,
            'paymentMethod' => $this->paymentMethod,
            'auth' => [
                'login' => $this->login,
                'tranKey' => $this->tranKey,
                'nonce' => $this->nonce,
                'seed' => $this->seed
            ]
        ];

        return $data;
    }

    /**
     * Get the value of customerName
     */
    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    /**
     * Set the value of customerName
     *
     * @return  self
     */
    public function setCustomerName(string $customerName): self
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get the value of customerEmail
     */
    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    /**
     * Set the value of customerEmail
     *
     * @return  self
     */
    public function setCustomerEmail(string $customerEmail): self
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * Get the value of customerMobile
     */
    public function getCustomerMobile(): string
    {
        return $this->customerMobile;
    }

    /**
     * Set the value of customerMobile
     *
     * @return  self
     */
    public function setCustomerMobile(string $customerMobile): self
    {
        $this->customerMobile = $customerMobile;

        return $this;
    }

    /**
     * Get the value of productReference
     */
    public function getProductReference(): string
    {
        return $this->productReference;
    }

    /**
     * Set the value of productReference
     *
     * @return  self
     */
    public function setProductReference(string $productReference): self
    {
        $this->productReference = $productReference;

        return $this;
    }

    /**
     * Get the value of productDescription
     */
    public function getProductDescription(): string
    {
        return $this->productDescription;
    }

    /**
     * Set the value of productDescription
     *
     * @return  self
     */
    public function setProductDescription(string $productDescription): self
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    /**
     * Get the value of productAmount
     */
    public function getProductAmount(): string
    {
        return $this->productAmount;
    }

    /**
     * Set the value of productAmount
     *
     * @return  self
     */
    public function setProductAmount(string $productAmount): self
    {
        $this->productAmount = $productAmount;

        return $this;
    }

    /**
     * Get the value of ipAddress
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * Set the value of ipAddress
     *
     * @return  self
     */
    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get the value of returnUrl
     */
    public function getReturnUrl(): string
    {
        return $this->returnUrl;
    }

    /**
     * Set the value of returnUrl
     *
     * @return  self
     */
    public function setReturnUrl(string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    /**
     * Get the value of userAgent
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Set the value of userAgent
     *
     * @return  self
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get the value of paymentMethod
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * Set the value of paymentMethod
     *
     * @return  self
     */
    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get the value of login
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of tranKey
     */
    public function getTranKey(): string
    {
        return $this->tranKey;
    }

    /**
     * Set the value of tranKey
     *
     * @return  self
     */
    public function setTranKey(string $tranKey): self
    {
        $this->tranKey = $tranKey;

        return $this;
    }

    /**
     * Get the value of nonce
     */
    public function getNonce(): string
    {
        return $this->nonce;
    }

    /**
     * Set the value of nonce
     *
     * @return  self
     */
    public function setNonce(string $nonce): self
    {
        $this->nonce = $nonce;

        return $this;
    }

    /**
     * Get the value of seed
     */
    public function getSeed(): string
    {
        return $this->seed;
    }

    /**
     * Set the value of seed
     *
     * @return  self
     */
    public function setSeed(string $seed): self
    {
        $this->seed = $seed;

        return $this;
    }

    /**
     * Get the value of orderId
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */
    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }
}
