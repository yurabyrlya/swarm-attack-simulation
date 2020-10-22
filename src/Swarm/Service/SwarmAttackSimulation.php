<?php


namespace App\Swarm\Service;


use App\Swarm\Model\Beehive;

class SwarmAttackSimulation implements SwarmAttackSimulationInterface
{

    /**
     * @inheritDoc
     */
    static function SimulateAttack(): array
    {
        $beehive = new Beehive();
        $beehive->setName('Good Beehive');

        $angryBeehive = new Beehive();
        $angryBeehive->setName('Angry Beehive');

        $bm = new BeesManager($beehive);
        $bm->addQueen()
            ->addWorkers(rand(15,20))
            ->addWarriors(rand(10,15));

        $bm->setBeehive($angryBeehive);
        $bm->addQueen()
            ->addWorkers(rand(15,20))
            ->addWarriors(rand(10,15));

        $war = new WarBeesManager($beehive , $angryBeehive);

        return $war->beginWar()->getResult();

    }
}