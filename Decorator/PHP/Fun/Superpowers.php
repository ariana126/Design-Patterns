<?php


namespace DesignPatterns\Decorator\PHP\Fun;


interface HumanBeing
{

    public function sayYourAbilities();

}

class NormalHuman implements HumanBeing
{

    public function sayYourAbilities()
    {
        echo 'Normal human abilities' . PHP_EOL;
    }

}

abstract class SuperHuman implements HumanBeing
{

    /**
     * @var HumanBeing
     */
    private $human;

    public function __construct(HumanBeing $human)
    {
        $this->human = $human;
    }

    public function sayYourAbilities()
    {
        $this->human->sayYourAbilities();
        $this->sayYourSuperPowers();
    }

    abstract public function sayYourSuperPowers();

}

class ImmortalHuman extends SuperHuman
{

    public function sayYourSuperPowers()
    {
        echo 'Immortality' . PHP_EOL;
    }

}

class SuperStrongHuman extends SuperHuman
{

    public function sayYourSuperPowers()
    {
        echo 'Superhuman strength' . PHP_EOL;
    }

}

$ironMan        = new NormalHuman();
$captainAmerica = new SuperStrongHuman($ironMan);
$deadpool       = new ImmortalHuman($ironMan);
$superman       = new SuperStrongHuman($deadpool);

echo 'Iron Man: ' . PHP_EOL;
$ironMan->sayYourAbilities();

echo PHP_EOL;

echo 'Captain America: ' . PHP_EOL;
$captainAmerica->sayYourAbilities();

echo PHP_EOL;

echo 'Deadpool: ' . PHP_EOL;
$deadpool->sayYourAbilities();

echo PHP_EOL;

echo 'Superman: ' . PHP_EOL;
$superman->sayYourAbilities();