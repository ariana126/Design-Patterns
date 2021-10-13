<?php

require'AmuoFilterChiProxy.php';


$proxiedInternet = new AmuoFilterChiProxy();


// This website is denied by Uncle FilterChi
$proxiedInternet->connectTo('amuoHub.com');

// This website is allowed by Uncle FilterChi
$proxiedInternet->connectTo('google.com');
