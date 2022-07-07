<?php

namespace App\Service;

use App\Entity\Score;
use Doctrine\ORM\EntityManagerInterface;

class ScoreService
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function save(Score $score): void
    {
        $this->entityManager->persist($score);
        $this->entityManager->flush();
    }
}
