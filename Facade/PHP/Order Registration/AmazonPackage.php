<?php


namespace DesignPatterns\Facade\PHP\OrderRegistration;


class Order
{

    private string $id;

    private int    $price;

    public function __construct(string $id)
    {
        $this->id    = $id;
        $this->price = 0;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

}

class PriceCalculator
{

    public function calculatePriceFor(Order $order): int
    {
        return rand(3, 10);
    }

}

class AmazonCommunicationService
{

    public function registerOrder(Order $order): void
    {
        echo 'Order with Id: ' . $order->getId() . ' and price: ' . $order->getPrice() . ' registered.' . PHP_EOL;
    }

    public function registerUser(): void
    {
        echo PHP_EOL;
    }

}