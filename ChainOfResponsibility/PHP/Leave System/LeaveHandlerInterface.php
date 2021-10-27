<?php


interface LeaveHandlerInterface
{
    /**
     * @param LeaveHandlerInterface $supervisor
     */
    public function setSupervisor(LeaveHandlerInterface $supervisor): void;

    /**
     * @param Leave $leave
     */
    public function handle(Leave $leave);
}