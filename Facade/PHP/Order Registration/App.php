<?php


namespace DesignPatterns\Facade\PHP\OrderRegistration;


require 'AmazonPackage.php';

class AmazonOrderRegistrationService
{

    private PriceCalculator            $priceCalculator;

    private AmazonCommunicationService $amazonCommunicationService;

    public function __construct()
    {
        $this->priceCalculator            = new PriceCalculator;
        $this->amazonCommunicationService = new AmazonCommunicationService;
    }

    public function register(string $id): void
    {
        $order = new Order($id);

        $order->setPrice(
            $this->priceCalculator->calculatePriceFor($order)
        );

        $this->amazonCommunicationService->registerOrder($order);
    }

}


$orderRegistrationService = new AmazonOrderRegistrationService();

$orderRegistrationService->register('Order-1');
$orderRegistrationService->register('Order-2');
$orderRegistrationService->register('Order-3');