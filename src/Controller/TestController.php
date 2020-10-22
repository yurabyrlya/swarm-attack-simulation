<?php

namespace App\Controller;

use App\Swarm\Service\SwarmAttackSimulationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @var SwarmAttackSimulationInterface
     */
    private $swarmAttack;

    /**
     * TestController constructor.
     * @param SwarmAttackSimulationInterface $swarmAttack
     */
    public function __construct(SwarmAttackSimulationInterface $swarmAttack)
    {
        $this->swarmAttack = $swarmAttack;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('test/index.html.twig',
            ['data' => json_encode($this->swarmAttack->SimulateAttack())] );
    }

    /**
     * @Route("/data", name="data")
     */
    public function data()
    {
        return new JsonResponse($this->swarmAttack->SimulateAttack());
    }
}
