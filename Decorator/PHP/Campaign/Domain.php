<?php


namespace DesignPatterns\Decorator\PHP\Campaign;


interface PriceCalculator
{

    public function calculate(): int;

}

class UserRegistrationPriceCalculator implements PriceCalculator
{

    public function calculate(): int
    {
        return 20;
    }

}

abstract class PriceModifier implements PriceCalculator
{

    /**
     * @var PriceCalculator
     */
    private $priceCalculator;

    public function __construct(PriceCalculator $priceCalculator)
    {
        $this->priceCalculator = $priceCalculator;
    }

    public function calculate(): int
    {
        return $this->priceCalculator->calculate();
    }

}

class Campaign20SepDiscountCalculator extends PriceModifier
{

    public function calculate(): int
    {
        return parent::calculate() - 5;
    }

}

class BlackFridayDiscountCalculator extends PriceModifier
{

    public function calculate(): int
    {
        return parent::calculate() - 2;
    }

}

class NotVerifiedUserPenaltyCalculator extends PriceModifier
{

    public function calculate(): int
    {
        return parent::calculate() + 6;
    }

}