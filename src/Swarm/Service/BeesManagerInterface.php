<?php


namespace App\Swarm\Service;

use App\Swarm\Model\BeehiveInterface;
use App\Swarm\Model\BeeInterface;

/**
 * Interface BeesManagerInterface
 * @package App\Swarm\Service
 */
interface BeesManagerInterface
{
    /**
     * This method create a queen
     * @return $this
     */
    public function addQueen():self;

    /**
     * Method create bees workers
     * @param int $quantity
     * @return $this
     */
    public function addWorkers(int $quantity): self;

    /**
     * Method create bees warriors
     * @param int $quantity
     * @return $this
     */
    public function addWarriors(int $quantity): self;


}