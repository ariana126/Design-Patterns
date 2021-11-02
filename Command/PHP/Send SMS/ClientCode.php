<?php


namespace DesignPatterns\Command\PHP\SendSMS;


require 'Entities.php';


$queue = new Queue;

$queue->addJob(new SendSMSCommand('phone-number-1', 'Body 1'));
$queue->addJob(new SendSMSCommand('phone-number-2', 'Body 2'));
$queue->addJob(new SendSMSCommand('phone-number-3', 'Body 3'));

var_dump($queue->getJobs());

echo PHP_EOL;

$queue->executeJobs();

echo PHP_EOL;

var_dump($queue->getJobs());
