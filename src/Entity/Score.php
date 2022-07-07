<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Player::class, inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private Player $player;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    private int $points;

    #[ORM\ManyToOne(targetEntity: Season::class, inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private Season $season;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): self
    {
        $this->season = $season;

        return $this;
    }
}
