<?php

namespace App\Controller;

use App\Entity\DopaminePassword;
use App\Form\DopaminePasswordType;
use App\Repository\DopaminePasswordRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse as RedirectResponseAlias;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DopamineController extends AbstractController
{
    #[Route('/dopamine', name: 'dopamine')]
    public function index(): Response
    {
        return $this->render('dopamine/index.html.twig', [
            'controller_name' => 'DopamineController',
        ]);
    }

    #[Route('/dopamine', name: 'dopamine', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager, DopaminePasswordRepository $passwordRepository): Response
    {
        $passwords = $passwordRepository->findAll();

        $password = new DopaminePassword();

        $form = $this->createForm(DopaminePasswordType::class, $password);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var DopaminePassword  $data */
            $data = $form->getData();

            $charsCount = $form->get('chars')->getData();
            $randomPassword = rand(pow(10, $charsCount - 1), pow(10, $charsCount)-1);

            $password->setStart($data->getStart());
            $password->setFinish($data->getFinish());
            $password->setPassword($randomPassword);

            $entityManager->persist($password);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                $password->getPassword()
            );

            return $this->redirectToRoute('dopamine');
        }

        return $this->renderForm('dopamine/index.html.twig', [
            'form' => $form,
            'passwords' => $passwords
        ]);
    }

    #[Route('/dopamine/{password}', name: 'dopamine_delete', methods: ['DELETE', 'POST'])]
    public function delete(DopaminePassword $password, EntityManagerInterface $entityManager, DopaminePasswordRepository $passwordRepository): RedirectResponseAlias
    {
        $password = $passwordRepository->find($password->getId());

        $entityManager->remove($password);
        $entityManager->flush();

        return $this->redirectToRoute('dopamine');
    }
}

