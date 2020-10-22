<?php


namespace App\Swarm\Service;


use App\Swarm\Model\Bee;
use App\Swarm\Model\BeehiveInterface;
use App\Swarm\Model\BeeInterface;

class WarBeesManager implements WarBeesManagerInterface
{
    /**
     * @var BeehiveInterface
     */
    private $beehive;
    /**
     * @var BeehiveInterface
     */
    private $enemyBeehive;

    /**
     * property  will have the details of war
     * @var array
     */
    private $warData = [];

    /**
     * WarBeesManager constructor.
     * @param BeehiveInterface $beehive
     * @param BeehiveInterface $enemyBeehive
     */
    public function __construct(BeehiveInterface $beehive , BeehiveInterface $enemyBeehive)
    {
        $this->beehive = $beehive;
        $this->enemyBeehive = $enemyBeehive;
    }


    /**
     * @inheritDoc
     */
    public function fight(BeeInterface $bee, BeeInterface $enemyBee): WarBeesManagerInterface
    {
        $data = $this->getDataPattern($bee , $enemyBee);

        $bee->setHealth($bee->getHealth() - $enemyBee->getDamage());
        $enemyBee->setHealth($enemyBee->getHealth() - $bee->getDamage());

        $data['bee']['health_after_fight'] = $bee->getHealth() >=0 ?  $bee->getHealth() : 'died';
        $data['enemy_bee']['health_after_fight'] = $enemyBee->getHealth() > 0 ? $enemyBee->getHealth() : 'died';

       array_push($this->warData , $data);

        /**
         * Clean the beehive if bee died
         */
        if ($bee->getHealth() <= 0) $this->beehive->unsetDiedBee($bee);
        if ($enemyBee->getHealth() <= 0) $this->enemyBeehive->unsetDiedBee($enemyBee);

       return $this;
    }

    /**
     * @inheritDoc
     */
    public function getResult(): array
    {
        return $this->warData;
    }

    /**
     * @return $this|WarBeesManagerInterface
     */
    public function beginWar(): WarBeesManagerInterface
    {
        $queen = $this->beehive->getQueen();
        $enemyQueen = $this->enemyBeehive->getQueen();

        while ($queen->isAlive() && $enemyQueen->isAlive()){

            $bee = $this->beehive->getRandomBee();
            $enemyBee = $this->enemyBeehive->getRandomBee();

            $this->fight($bee , $enemyBee);

        }

        if (!$queen->isAlive()) $this->warData['Won'] = $this->enemyBeehive->getName();
        if (!$enemyQueen->isAlive()) $this->warData['Won'] = $this->beehive->getName();

        return $this;
    }

    /**
     * @param Bee $bee
     * @param Bee $enemyBee
     * @return array
     */
    private function getDataPattern(Bee $bee , Bee $enemyBee){

        $time = new \DateTime('now');
        $time = $time->format('Y-m-d H:i:s');
        return [
            'fight_id' => uniqid(),
            'date_fight' => $time,
            'bee' => ['damage' => $bee->getDamage(), 'health_before' => $bee->getHealth() , 'role' => $bee->getRole() ],
            'enemy_bee' => [ 'damage' => $enemyBee->getDamage() ,'health_before' => $enemyBee->getHealth(), 'role' => $enemyBee->getRole()]
        ];
    }

}