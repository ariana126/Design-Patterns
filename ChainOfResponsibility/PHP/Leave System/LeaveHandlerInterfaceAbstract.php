<?php


require_once 'LeaveHandlerInterface.php';

abstract class LeaveHandlerInterfaceAbstract implements LeaveHandlerInterface
{
    protected LeaveHandlerInterface $supervisor;

    /**
     * @param LeaveHandlerInterface $supervisor
     */
    public function setSupervisor(LeaveHandlerInterface $supervisor): void
    {
        $this->supervisor = $supervisor;
    }
}