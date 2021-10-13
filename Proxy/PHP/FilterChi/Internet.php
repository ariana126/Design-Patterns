<?php

require_once 'InternetInterface.php';


class Internet implements InternetInterface
{
    /**
     * Connects to requested website
     *
     * @param string $website
     * @return void
     */
    public function connectTo(string $website)
    {
        echo 'Welcome to ' . $website . PHP_EOL;
    }
}