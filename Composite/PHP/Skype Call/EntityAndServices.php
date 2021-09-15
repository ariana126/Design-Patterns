<?php


interface CallableEntity
{

    public function makeCall(): void;

}

class CallService
{

    private static array $callQueue = [];

    private static self  $instance;

    private function __construct()
    {
    }

    public static function call(string $mobile): void
    {
        $instance = self::getInstance();

        $instance::$callQueue[] = $mobile;
    }

    public static function getCallQueue(): array
    {
        return self::getInstance()::$callQueue;
    }

    private static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}

class User implements CallableEntity
{

    private string $id;

    private string $name;

    private string $mobile;

    public function __construct(string $name, string $mobile)
    {
        $this->name   = $name;
        $this->mobile = $mobile;
    }

    public function makeCall(): void
    {
        CallService::call($this->mobile);
    }

}

class Group implements CallableEntity
{

    private string $id;

    private string $name;

    /**
     * @var User[]
     */
    private array  $members;

    public function __construct(string $name, array $members)
    {
        $this->name    = $name;
        $this->members = $members;
    }

    public function makeCall(): void
    {
        foreach ($this->members as $member) {
            $member->makeCall();
        }
    }

}

class Server implements CallableEntity
{

    private string $id;

    private string $name;

    /**
     * @var Group[]
     */
    private array  $groups;

    /**
     * @var Server[]
     */
    private array  $subServers;

    public function __construct(string $name, array $groupes, array $subServers)
    {
        $this->name       = $name;
        $this->groups     = $groupes;
        $this->subServers = $subServers;
    }

    public function makeCall(): void
    {
        foreach ($this->groups as $group) {
            $group->makeCall();
        }
        foreach ($this->subServers as $server) {
            $server->makeCall();
        }
    }

}