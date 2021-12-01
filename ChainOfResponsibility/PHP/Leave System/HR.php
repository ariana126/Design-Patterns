<?php


class HR extends LeaveHandlerAbstract
{

    public function handle(Leave $leave)
    {
        if ($leave->getNumberOfDays() <= 21)
        {
            if ($leave->getEmployeeLevel() <= 3 && !$leave->getReason() == Reason::REGULAR)
            {
                echo "Your leave days has been APPROVED by HR".PHP_EOL;
            }else
            {
                echo "Your leave request has been DENIED by HR".PHP_EOL;
            }
        }else
        {
            return $this->supervisor->handle($leave);
        }
    }
}