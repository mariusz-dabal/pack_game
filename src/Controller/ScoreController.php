<?php

namespace App\Controller;

use App\Entity\Score;
use App\Form\ScoreType;
use App\Service\ScoreService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    #[Route('/score', name: 'score')]
    public function index(): Response
    {
        return $this->render('score/index.html.twig', [
            'controller_name' => 'ScoreController',
        ]);
    }

    #[Route('/score/new')]
    public function new(Request $request, ScoreService $scoreService): Response
    {
        $score = new Score();

        $form = $this->createForm(ScoreType::class, $score);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $score = $form->getData();

            $scoreService->save($score);
        }

        return $this->renderForm('score/new.html.twig', [
            'form' => $form,
            ]
        );
    }
}
