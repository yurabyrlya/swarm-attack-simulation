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
    public function addBee(Bee $bee):self;
}