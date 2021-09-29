<?php


class Sender
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $address;

    /**
     * Receiver constructor.
     * @param string $name
     * @param string $address
     */
    public function __construct(string $name, string $address)
    {
        $this->name = $name;
        $this->address = $address;

        echo 'Setting Sender.' . PHP_EOL;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}