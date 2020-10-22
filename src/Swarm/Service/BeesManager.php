<?php


namespace App\Swarm\Service;


use App\Swarm\Model\Bee;
use App\Swarm\Model\Beehive;
use App\Swarm\Model\BeehiveInterface;
use App\Swarm\Model\BeeInterface;

/**
 * Class BeesManager
 * @package App\Swarm\Service
 */
class BeesManager implements BeesManagerInterface
{
    /**
     * prepare Beehive for the Bees
     * @var Beehive
     */
    private $beehive;

    public function __construct(Beehive $beehive)
    {
        $this->beehive = $beehive;
    }

    /**
     * @inheritDoc
     */
    public function addQueen(): BeesManagerInterface
    {
        $queen = new Bee();

        $queen->setId(rand()) // is not a good solution for generate id with rand | only for test
            ->setRole(Bee::QUEEN_CODE)
            ->setHealth(Bee::QUEEN_HEALTH)
            ->setDamage(Bee::QUEEN_DAMAGE);

        $this->beehive->addBee($queen);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addWorkers(int $quantity): BeesManagerInterface
    {
        /**
         * Generating the workers bees
         */
        for ($i = 1; $i <= $quantity; $i++) {

            $worker = new Bee();
            $worker->setId(rand())
                ->setRole(Bee::WORKER_CODE)
                ->setHealth(Bee::WORKER_HEALTH)
                ->setDamage(Bee::WORKER_DAMAGE);

            $this->beehive->addBee($worker);

        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addWarriors(int $quantity): BeesManagerInterface
    {
        /**
         * Generating the Warriors bees
         */
        for ($i = 1; $i <= $quantity; $i++) {

            $warrior = new Bee();
            $warrior->setId(rand())
                ->setRole(Bee::WARRIOR_CODE)
                ->setHealth(Bee::WARRIOR_HEALTH)
                ->setDamage(Bee::WARRIOR_DAMAGE);

            $this->beehive->addBee($warrior);

        }
        return $this;
    }


    /**
     * @param Beehive $beehive
     */
    public function setBeehive(Beehive $beehive): void
    {
        $this->beehive = $beehive;
    }
}