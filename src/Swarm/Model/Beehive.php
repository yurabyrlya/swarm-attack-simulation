<?php


namespace App\Swarm\Model;

use phpDocumentor\Reflection\Types\This;

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
     * @param Bee $bee
     * @return $this|BeehiveInterface
     */
    public function addBee(Bee $bee): BeehiveInterface
    {
        array_push($this->bees, $bee);
        return $this;
    }

}

