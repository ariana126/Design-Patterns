<?php


namespace ChainOfResponsibility\PHP\OrderRegistration;


class Order
{

    private string $id;

    private string $sellerId;

    public function __construct(string $id, string $sellerId)
    {
        $this->id       = $id;
        $this->sellerId = $sellerId;
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
    public function getSellerId(): string
    {
        return $this->sellerId;
    }

}

class RegisterOrderRequest
{

    private string $sellerId;

    public function __construct(string $sellerId)
    {
        $this->sellerId = $sellerId;
    }

    /**
     * @return string
     */
    public function getSellerId(): string
    {
        return $this->sellerId;
    }

}

abstract class OrderRegistrationHandler
{

    private OrderRegistrationHandler $nextHandler;

    public function setNext(OrderRegistrationHandler $handler): OrderRegistrationHandler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    abstract public function handle(RegisterOrderRequest $request): void;

    protected function passRequest(RegisterOrderRequest $request): void
    {
        if (isset($this->nextHandler)) {
            $this->nextHandler->handle($request);
        }
    }

}

class OrderValidator extends OrderRegistrationHandler
{

    public function handle(RegisterOrderRequest $request): void
    {
        echo 'Validating the request...' . PHP_EOL;
        if ('v' === $request->getSellerId()[0]) {
            echo 'The request is valid.' . PHP_EOL;
            $this->passRequest($request);
        } else {
            echo 'The request is not valid.' . PHP_EOL;
            echo 'Throwing an exception and breaking the chain...' . PHP_EOL;
        }
    }

}

class AddOrderUseCase extends OrderRegistrationHandler
{

    public function handle(RegisterOrderRequest $request): void
    {
        echo 'An order has registered.' . PHP_EOL;
        $this->passRequest($request);
    }

}

class OrderVerificationService extends OrderRegistrationHandler
{

    public function handle(RegisterOrderRequest $request): void
    {
        echo 'Using SellerRepository to find the seller email...' . PHP_EOL;
        echo 'A verification email has sent to seller: ' . $request->getSellerId() . PHP_EOL;
        $this->passRequest($request);
    }

}