<?php


namespace DesignPatterns\ChainOfResponsibility\PHP\OrderRegistration;


require 'Entities.php';

$validator           = new OrderValidator();
$useCase             = new AddOrderUseCase();
$verificationService = new OrderVerificationService();

$validator->setNext($useCase)->setNext($verificationService);


echo '-Valid Request-' . PHP_EOL . PHP_EOL;
$validRequest = new RegisterOrderRequest('valid-seller-id');

echo '-Start with validation' . PHP_EOL;
$validator->handle($validRequest);

echo PHP_EOL;

echo '-Start with verification' . PHP_EOL;
$verificationService->handle($validRequest);

echo PHP_EOL;
echo PHP_EOL;

echo '-Invalid Request-' . PHP_EOL . PHP_EOL;
$invalidRequest = new RegisterOrderRequest('invalid-seller-id');

echo '-Start with validation' . PHP_EOL;
$validator->handle($invalidRequest);

echo PHP_EOL;

echo '-Start with registration' . PHP_EOL;
$useCase->handle($invalidRequest);

