<?php


namespace App\Swarm\Service;

use App\Swarm\Model\BeehiveInterface;
use App\Swarm\Model\BeeInterface;

/**
 *  War bees Interface
 * Interface WarBeesManagerInterface
 * @package App\Swarm\Service
 */
interface WarBeesManagerInterface
{

    public function beginWar():self;

    /**
     * Method fight for bees
     * @param BeeInterface $bee
     * @param BeeInterface $enemyBee
     * @return $this
     */
    public function fight(BeeInterface $bee, BeeInterface $enemyBee):self;

    /**
     * Get the result of war
     * @return array
     */
    public function getResult():array;
}