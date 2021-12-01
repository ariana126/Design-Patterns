<?php


namespace DesignPatterns\Command\PHP\SendSMS;


interface Command
{

    public function execute(): void;

}

class SendSMSCommand implements Command
{

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $body;

    public function __construct(
        string $phoneNumber,
        string $body
    )
    {
        $this->phoneNumber = $phoneNumber;
        $this->body        = $body;
    }

    public function execute(): void
    {
        echo 'A SMS has sent to ' . $this->phoneNumber . ' with body ' . $this->body . PHP_EOL;
    }

}

class Queue
{

    /**
     * @var array<Command>
     */
    private array $jobs = [];

    public function getJobs(): array
    {
        return $this->jobs;
    }

    public function addJob(Command $command): void
    {
        $this->jobs[] = $command;
    }

    public function executeJobs(): void
    {
        foreach ($this->jobs as $index => $job) {
            $job->execute();
            unset($this->jobs[$index]);
        }
    }

}