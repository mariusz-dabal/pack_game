<?php

namespace App\Controller;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    #[Route('/', name: 'players')]
    public function index(PlayerRepository $repository): Response
    {
//        $player = new Player();
//        $player->setName('Mariusz');
//        $player->getName();
//
//        $player2 = new Player();
//        $player2->setName('Maciej');


        $players = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'players' => $players,
        ]);
    }
}
