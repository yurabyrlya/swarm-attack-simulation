<?php


namespace App\Swarm\Service;

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
}