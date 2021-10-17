<?php


namespace DesignPatterns\Composite\PHP\SkypeCall;


require 'EntityAndServices.php';

$user1 = new User('Name 1', 'Mobile 1');
$user2 = new User('Name 2', 'Mobile 2');
$user3 = new User('Name 3', 'Mobile 3');
$user4 = new User('Name 4', 'Mobile 4');
$user5 = new User('Name 5', 'Mobile 5');
$user6 = new User('Name 6', 'Mobile 6');


$group1 = new Group('Small Group 1', [$user1, $user2]);
$group2 = new Group('Small Group 2', [$user3, $user4]);
$group3 = new Group('Small Group 3', [$user5, $user6]);


$gameServer = new Server('Mafia Server', [$group3], []);
$mainServer = new Server('Podro Server', [$group1, $group2], [$gameServer]);

$mainServer->makeCall();

foreach (callService::getCallQueue() as $mobile) {
    echo $mobile . PHP_EOL;
}