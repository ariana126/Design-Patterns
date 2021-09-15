<?php


abstract class SurveyCorpsMember
{

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayTheWords(): void
    {
        echo $this->name . ': SHINZOU WO SASAGEYO!' . PHP_EOL;
    }

}

class Commander extends SurveyCorpsMember
{

    /**
     * @var SurveyCorpsMember[]
     */
    public array $subalterns;

    public function __construct(string $name, array $subalterns)
    {
        parent::__construct($name);
        $this->subalterns = $subalterns;
    }

    public function sayTheWords(): void
    {
        parent::sayTheWords();
        foreach ($this->subalterns as $subaltern) {
            $subaltern->sayTheWords();
        }
    }

}

class Soldier extends SurveyCorpsMember
{

}


$attackTitan       = new Soldier('Eren Yeager');
$ackermannGirl     = new Soldier('Mikasa Ackerman');
$newColossalTitan  = new Soldier('Armin Arlert');
$potatoGirl        = new Soldier('Sasha Braus');
$horse             = new Soldier('Jean Kirstein');
$potatoGirlsFriend = new Soldier('Connie Springer');
$armoredTitan      = new Soldier('Reiner Braun');
$femaleTitan       = new Soldier('Annie Leonhart');
$deadColossalTitan = new Soldier('Bertolt Hoover');

$titanLover                = new Commander('Hange Zoe', [$attackTitan, $potatoGirl, $deadColossalTitan]);
$humanityStrongestSoldier = new Commander('Levi Ackerman', [$ackermannGirl, $newColossalTitan, $horse, $potatoGirlsFriend, $armoredTitan, $femaleTitan]);
$theLegend                 = new Commander('Erwin Smith', [$humanityStrongestSoldier, $titanLover]);


$theLegend->sayTheWords();