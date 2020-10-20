<?php


namespace App\Swarm\Model;

/**
 * Interface BeeInterface
 * @package App\Swarm\Model
 */
interface BeeInterface
{
    /**
     * Role Of Bee Must be (Queen = 1|Worker = 2|Warrior = 3)
     * @return int
     */
    public function getRole():int;

    /**
     * Role Of Bee Must be (Queen = 1|Worker = 2|Warrior = 3)
     * @param int $role
     */
    public function SetRole(int $role);

    /**
     * @param int $health
     */
    public function setHealth(int $health);

    /**
     * @param int $damage
     */
    public function setDamage(int $damage);

    /**
     * @return int
     */
    public function getDamage():int;

}