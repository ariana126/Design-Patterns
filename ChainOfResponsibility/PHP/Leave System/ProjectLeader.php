<?php


class ProjectLeader extends LeaveHandlerInterfaceAbstract
{

    public function handle(Leave $leave)
    {
        if ($leave->getNumberOfDays() <= 14)
        {
            if ($leave->getEmployeeLevel() <= 3)
            {
                echo "Your leave days has been APPROVED by Project Leader".PHP_EOL;
            }else
            {
                echo "You employee Tier level is too low for request " . $leave->getNumberOfDays() . " days".PHP_EOL;
            }
        }else
        {
            return $this->supervisor->handle($leave);
        }
    }
}