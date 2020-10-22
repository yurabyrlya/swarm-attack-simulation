<?php


namespace App\Swarm\Model;


use phpDocumentor\Reflection\Types\This;
use function Symfony\Component\String\b;

/**
 * Class Beehive
 * @package App\Swarm\Model
 */
class Beehive implements BeehiveInterface
{
    /**
     * The simple string name of beehive
     * @var string $name
     */
    private $name;

    /**
     * the property contain all bees in current Beehive
     * @var array
     */
    private $bees = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Beehive
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getBees(): array
    {
        return $this->bees;
    }

    /**
     * @inheritDoc
     * @param BeeInterface $bee
     * @return $this|BeehiveInterface
     */
    public function addBee(BeeInterface $bee): BeehiveInterface
    {
        array_push($this->bees, $bee);
        return $this;
    }

    /**
     * @return BeeInterface
     */
    public function getRandomBee(): BeeInterface
    {
        $id = rand(0, count($this->bees) - 1);
        return $this->bees[$id];
    }

    public function getQueen() : ?BeeInterface{

        foreach ($this->bees as $bee) {
                /**
                 * @var  Bee $bee
                 */
                if ($bee->getRole() === Bee::QUEEN_CODE) return $bee;

        }
        return null;
    }

    function unsetDiedBee( Bee $bee, $strict = TRUE)
    {
        $key = array_search($bee, $this->bees, $strict);
        unset($this->bees[$key]);
        $this->bees = array_values($this->bees);
        return $bee;

    }
}

