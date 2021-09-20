<?php

require './Domain.php';

$normalCalculator = new UserRegistrationPriceCalculator();

$campaign20SepCalculator = new Campaign20SepDiscountCalculator($normalCalculator);
$blackFridayCalculator   = new BlackFridayDiscountCalculator($normalCalculator);
$penaltyCalculator       = new NotVerifiedUserPenaltyCalculator($normalCalculator);

$campaignAndBlackFridayCalculator           = new BlackFridayDiscountCalculator($campaign20SepCalculator);
$campaignAndPenaltyCalculator               = new Campaign20SepDiscountCalculator($penaltyCalculator);
$blackFridayAndPenaltyCalculator            = new NotVerifiedUserPenaltyCalculator($blackFridayCalculator);
$campaignAndBlackFridayAndPenaltyCalculator = new Campaign20SepDiscountCalculator($blackFridayAndPenaltyCalculator);


function printUserRegistrationPrice(PriceCalculator $calculator, string $name)
{
    echo $name . ': ' . $calculator->calculate() . PHP_EOL;
}

printUserRegistrationPrice($normalCalculator, 'Normal');

printUserRegistrationPrice($campaign20SepCalculator, 'Campaign 20 Sep');
printUserRegistrationPrice($blackFridayCalculator, 'Black Friday');
printUserRegistrationPrice($penaltyCalculator, 'With Penalty');

printUserRegistrationPrice($campaignAndBlackFridayCalculator, 'Campaign 20 Sep and Black Friday');
printUserRegistrationPrice($campaignAndPenaltyCalculator, 'Campaign 20 Sep With Penalty');
printUserRegistrationPrice($blackFridayAndPenaltyCalculator, 'Black Friday and With Penalty');
printUserRegistrationPrice($campaignAndBlackFridayAndPenaltyCalculator, 'Campaign 20 Sep and Black Friday With Penalty');
