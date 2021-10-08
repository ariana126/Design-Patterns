<?php

require './Entities.php';

$game = new Battlefield();

$game->addPlayer('Slackspore', 100, 'Luke Skywalker', 'Black');
$game->addPlayer('Kevin Spacey', 100, 'Luke Skywalker', 'Black');
$game->addPlayer('Zeldarian', 100, 'Luke Skywalker', 'White');
$game->addPlayer('PewDiePie', 100, 'Chewbacca', 'Blue');
$game->addPlayer('nightwatcher', 100, 'Chewbacca', 'Blue');

$game->startNewRound();