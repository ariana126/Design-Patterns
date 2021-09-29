<?php


class ApiRequest
{
    /**
     * @var array
     */
    private array $data;

    /**
     * ApiRequest constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Calls API
     */
    public function callApi()
    {
        echo 'Order Registered.' . PHP_EOL;
    }
}