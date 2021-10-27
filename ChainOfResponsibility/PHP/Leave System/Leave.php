<?php


class Leave
{
    /**
     * @var int
     */
    private int $numberOfDays;

    /**
     * @var int
     */
    private int $employeeLevel;

    /**
     * @var string
     */
    private string $reason;

    /**
     * Leave constructor.
     * @param int $numberOfDays
     * @param int $employeeLevel
     * @param string $reason
     */
    public function __construct(int $numberOfDays, int $employeeLevel, string $reason)
    {
        $this->numberOfDays  = $numberOfDays;
        $this->employeeLevel = $employeeLevel;
        $this->reason        = $reason;
    }

    /**
     * @return int
     */
    public function getNumberOfDays(): int
    {
        return $this->numberOfDays;
    }

    /**
     * @return int
     */
    public function getEmployeeLevel(): int
    {
        return $this->employeeLevel;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }
}