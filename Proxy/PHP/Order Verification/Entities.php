<?php


namespace DesignPatterns\Proxy\PHP\OrderVerifications;


interface OrderVerificationService
{

    public function sendVerificationMessageFor(Order $order): void;

}

class Order
{

    private string $id;

    private string $customerEmail;

    private string $sellerID;

    public function __construct(string $id, string $customerEmail, string $sellerID)
    {
        $this->id            = $id;
        $this->customerEmail = $customerEmail;
        $this->sellerID      = $sellerID;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    /**
     * @return string
     */
    public function getSellerID(): string
    {
        return $this->sellerID;
    }

}

class OrderVerificationServiceImpl implements OrderVerificationService
{

    public function sendVerificationMessageFor(Order $order): void
    {
        echo sprintf('A verification message for order: %s has sent to %s' . PHP_EOL, $order->getId(), $order->getCustomerEmail());
    }

}

class OrderVerificationServiceProxy implements OrderVerificationService
{

    private OrderVerificationServiceImpl $verificationService;

    private Config                       $config;

    public function __construct(
        OrderVerificationServiceImpl $verificationService,
        Config $config
    )
    {
        $this->verificationService = $verificationService;
        $this->config              = $config;
    }

    public function sendVerificationMessageFor(Order $order): void
    {
        if (!$this->isVerificationNeededFor($order)) {
            return;
        }

        $this->verificationService->sendVerificationMessageFor($order);
    }

    private function isVerificationNeededFor(Order $order): bool
    {
        foreach ($this->config->getEnterpriseSellerIds() as $sellerId) {
            if ($order->getSellerID() === $sellerId) {
                return false;
            }
        }

        return true;
    }

}

class Config
{

    /**
     * Enterprise sellers don't need verification for their orders.
     *
     * @var array<string>
     */
    private array $enterpriseSellerIds;

    public function __construct(array $enterpriseSellerIds)
    {
        $this->enterpriseSellerIds = $enterpriseSellerIds;
    }

    public function getEnterpriseSellerIds(): array
    {
        return $this->enterpriseSellerIds;
    }

}