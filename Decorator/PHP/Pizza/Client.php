<?php

require_once 'Pizza.php';

$pizza = new SimplePizza();

echo $pizza->getDescription() . ' Cost:' . $pizza->getCost() . "\n";

$pizza = new Stake($pizza);
$pizza = new Tomato($pizza);
$pizza = new Sausage($pizza);

echo $pizza->getDescription() . ' Cost: ' . $pizza->getCost();