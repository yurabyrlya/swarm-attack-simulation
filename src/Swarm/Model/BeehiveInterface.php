<?php


namespace App\Swarm\Model;


/**
 * Interface BeehiveInterface
 * @package App\Swarm\Model
 */
interface BeehiveInterface
{
    /*
     * this method add the bee to the Beehive
     * @return $this
     */
    public function addBee(BeeInterface $bee):self;

    /**
     * @param string $name
     * @return mixed
     */
    public function setName(string $name);

    /**
     * @return BeeInterface
     */
    public function getRandomBee():?BeeInterface;
}