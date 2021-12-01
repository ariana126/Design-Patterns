<?php

require_once 'InternetInterface.php';
require_once 'Internet.php';

class AmuoFilterChiProxy implements InternetInterface
{
    /**
     * @var Internet
     */
    private Internet $internetService;

    /**
     * @var array|string[]
     */
    private array $filter = [
        "amuoHub.com"
    ];

    /**
     * AmuoFilterChiProxy constructor.
     */
    public function __construct()
    {
        $this->internetService = new Internet();
    }

    /**
     * @param string $website
     * @return mixed|void
     */
    public function connectTo(string $website)
    {
        if (in_array($website, $this->filter)) {
            echo "ACCESS DENIED TO {".$website."}: Peyvandha" . PHP_EOL;
        } else {
            $this->internetService->connectTo($website);
        }
    }
}