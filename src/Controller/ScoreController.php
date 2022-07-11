<?php

namespace App\Controller;

use App\Entity\Score;
use App\Form\ScoreType;
use App\Repository\ScoreRepository;
use App\Service\ScoreService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    private ScoreRepository $scoreRepository;

    public function __construct(ScoreRepository $scoreRepository)
    {
        $this->scoreRepository = $scoreRepository;
    }

    #[Route('/score', name: 'score')]
    public function index(): Response
    {
        $scores = $this->scoreRepository->findAll();

        return $this->render('score/index.html.twig', [
            'scores' => $scores,
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
