<?php


class Parcel
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $description;

    /**
     * Parcel constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;


        echo 'Setting Parcel.' . PHP_EOL;
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
    public function getDescription(): string
    {
        return $this->description;
    }

}