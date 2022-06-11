<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    #[Route('/manual', name: 'manual')]
    public function showManual(): Response
    {
        return $this->render('sites/manual.html.twig');
    }
}
