<?php


namespace App\Swarm\Model;


use phpDocumentor\Reflection\Types\This;

class Bee implements BeeInterface
{

    public const QUEEN = 1;
    public const WORKER = 2;
    public const WARRIOR = 3;

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
    public function SetRole(int $role)
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
     * @return int
     */
    public function setId(int $id): int
    {
        return $this->id = $id;

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
     * @return mixed
     */
    public function getDamage():int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     * @return Bee
     */
    public function setDamage(int $damage)
    {
        $this->damage = $damage;
        return $this;
    }

}