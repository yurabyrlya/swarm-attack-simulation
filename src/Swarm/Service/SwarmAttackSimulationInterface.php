<?php


namespace App\Swarm\Service;

use App\Swarm\Model\BeehiveInterface;
use App\Swarm\Model\BeeInterface;

/**
 * Interface SwarmAttackSimulationInterface
 * @package App\Swarm\Service
 */
interface SwarmAttackSimulationInterface
{
    /**
     * Simulation  swarm attack and  getting results of fights
     * @return array
     */
    static function SimulateAttack():array;

}