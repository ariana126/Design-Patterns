<?php

interface Pizza
{
    public function getDescription(): string;

    public function getCost(): int;
}

class SimplePizza implements Pizza
{
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Pizza that has : Bread, Cheese';
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return 50000;
    }
}

class PizzaDecorator implements Pizza
{
    /**
     * @var Pizza
     */
    protected Pizza $wrappee;

    /**
     * PizzaDecorator constructor.
     * @param Pizza $wrappee
     */
    public function __construct(Pizza $wrappee)
    {
        $this->wrappee = $wrappee;
    }

    /**
     * @return mixed
     */
    public function getDescription(): string
    {
        return $this->wrappee->getDescription();
    }

    /**
     * @return mixed
     */
    public function getCost(): int
    {
        return $this->wrappee->getCost();
    }
}

class Stake extends PizzaDecorator
{
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->wrappee->getDescription() . ', Stake';
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->wrappee->getCost() + 25000;
    }
}

class Tomato extends PizzaDecorator
{
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->wrappee->getDescription() . ', Tomato';
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->wrappee->getCost() + 5000;
    }
}

class Sausage extends PizzaDecorator
{
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->wrappee->getDescription() . ', sausage ';
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->wrappee->getCost() + 10000;
    }
}