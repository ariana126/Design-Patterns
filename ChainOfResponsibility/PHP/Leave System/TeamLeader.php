<?php

require_once "LeaveHandlerInterfaceAbstract.php";

class TeamLeader extends LeaveHandlerInterfaceAbstract
{
    /**
     * @param Leave $leave
     * @return mixed
     */
    public function handle(Leave $leave)
    {
        if ($leave->getNumberOfDays() <= 7)
        {
            if ($leave->getEmployeeLevel() <= 4)
            {
                echo "Your leave days has been APPROVED by TeamLeader".PHP_EOL;
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