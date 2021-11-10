<?php


class Manager extends LeaveHandlerAbstract
{
    /**
     * @param Leave $leave
     */
    public function handle(Leave $leave)
    {
        if ($leave->getNumberOfDays() > 21)
        {
            if ($leave->getEmployeeLevel() <= 2 && $leave->getReason() == Reason::SPECIAL)
            {
                echo "Your leave days has been APPROVED by Manager".PHP_EOL;
            }
        }else
        {
            echo "Your leave request has been DENIED by Manager".PHP_EOL;
        }
    }
}