<?php

require_once 'TeamLeader.php';
require_once 'ProjectLeader.php';
require_once 'HR.php';
require_once 'Manager.php';
require_once 'Leave.php';
require_once 'Reason.php';

// Example from https://medium.com/geekculture/understanding-the-chain-of-responsibility-pattern-d729ef84621c

$teamLeader    = new TeamLeader();
$projectLeader = new ProjectLeader();
$hr            = new HR();
$manager       = new Manager();


$teamLeader->setSupervisor($projectLeader);
$projectLeader->setSupervisor($hr);
$hr->setSupervisor($manager);



$leave = new Leave(5,4,Reason::REGULAR);
$teamLeader->handle($leave);

$leave = new Leave(5,5,Reason::REGULAR);
$teamLeader->handle($leave);

$leave = new Leave(18,2,Reason::REGULAR);
$teamLeader->handle($leave);

$leave = new Leave(30,2,Reason::SPECIAL);
$teamLeader->handle($leave);