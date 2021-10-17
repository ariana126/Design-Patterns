<?php


namespace DesignPatterns\Flyqeight\PHP\StartWarsGame;


class Player
{

    private string          $name;

    private int             $hp;

    private PlayerCharacter $character;

    public function __construct(string $name, int $hp, PlayerCharacter $character)
    {
        $this->name      = $name;
        $this->hp        = $hp;
        $this->character = $character;
    }

    public function load(): void
    {
        $this->character->render($this->name, $this->hp);
        echo "Player $this->name ready." . PHP_EOL;
    }

}

class PlayerCharacter

{

    private string $name;

    private string $armorColor;

    public function __construct(string $name, string $armorColor)
    {
        $this->name       = $name;
        $this->armorColor = $armorColor;
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
    public function getArmorColor(): string
    {
        return $this->armorColor;
    }

    public function render(string $name, int $hp): void
    {
        echo "Character $this->name with armor color $this->armorColor rendered for player $name with HP $hp." . PHP_EOL;
    }

}

class Battlefield
{

    /**
     * @var PlayerCharacter[]
     */
    private array $characters = [];

    /**
     * @var Player[]
     */
    private array $players = [];

    public function addPlayer(string $name, int $hp, string $characterName, string $armorColor): void
    {
        $this->players[] = new Player($name, $hp, $this->getCharacter($characterName, $armorColor));
    }

    public function startNewRound(): void
    {
        echo 'Starting new match...' . PHP_EOL;
        echo 'Map loaded.' . PHP_EOL;
        echo 'Waiting for players...' . PHP_EOL;
        foreach ($this->players as $player) {
            echo PHP_EOL;
            $player->load();
            echo PHP_EOL;
        }
        echo 'Game started.' . PHP_EOL;

        echo PHP_EOL . 'Characters:' . PHP_EOL;
        foreach ($this->characters as $character) {
            echo sprintf('Name: %s, Armor color: %s' . PHP_EOL, $character->getName(), $character->getArmorColor());
        }
    }

    private function getCharacter(string $name, string $armorColor): PlayerCharacter
    {
        foreach ($this->characters as $character) {
            if ($name === $character->getName() && $armorColor === $character->getArmorColor()) {
                return $character;
            }
        }

        $newCharacter       = new PlayerCharacter($name, $armorColor);
        $this->characters[] = $newCharacter;
        return $newCharacter;
    }

}