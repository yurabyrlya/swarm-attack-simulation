<?php


namespace App\Swarm\Model;


class Bee implements BeeInterface
{

    public const QUEEN_CODE = 1;
    public const QUEEN_HEALTH = 50;
    public const QUEEN_DAMAGE = [1];

    public const WORKER_CODE = 2;
    public const WORKER_HEALTH = 5;
    public const WORKER_DAMAGE = [2,3,4];

    public const WARRIOR_CODE = 3;
    public const WARRIOR_HEALTH = 10;
    public const WARRIOR_DAMAGE = [4,5,6,7];


    /**
     * unique Id of any Bee
     * @var int $id
     */
    private $id;

    /**
     * The role of Bee
     * @var int $role
     */
    private $role;

    /**
     * Queen has 50 health  does 1 damage
     * Worker has 5 health  does 2-4 damage
     * Warrior has 10 health  does 4-7 damage
     * @var int $health
     */
    private $health = 0;

    /**
     * Queen does 1 damage
     * Worker does 2-4 damage
     * Warrior does 4-7 damage
     * @var int $damage
     */
    private $damage = 0;

    /**
     * @inheritDoc
     */
    public function setRole(int $role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @return int;
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Bee
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;

    }

    /**
     * @return int
     */
    public function getHealth():int
    {
        return $this->health;
    }

    /**
     * @param int $health
     * @return $this
     */
    public function setHealth(int $health)
    {
        $this->health = $health;
        return $this;
    }

    /**
     * return the random damage
     * @return int
     */
    public function getDamage():int
    {
        return $this->damage;
    }

    /**
     * @param array $damage
     * @return Bee
     */
    public function setDamage(array $damage)
    {
       $damage =  rand(min($damage) , max($damage));
        $this->damage = $damage;
        return $this;
    }

    /**
     * if the Bee is not died
     * @return bool
     */
    public function isAlive()
    {
        return true ? $this->getHealth() > 0 : false;
    }
}