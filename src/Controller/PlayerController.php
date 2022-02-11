<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PlayerController extends AbstractController
{
    #[Route('/api/players', name: 'players')]
    public function index(PlayerRepository $repository, SerializerInterface $serializer): Response
    {
        $players = $repository->findAll();
        $jsonContent = $serializer->serialize($players, 'json');

        return new Response($jsonContent, Response::HTTP_OK);
    }
}
