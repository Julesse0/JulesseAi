<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DataRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataRepository::class)]
#[ApiResource]
class Data
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $anime = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $traduction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnime(): ?string
    {
        return $this->anime;
    }

    public function setAnime(string $anime): static
    {
        $this->anime = $anime;

        return $this;
    }

    public function getTraduction(): ?string
    {
        return $this->traduction;
    }

    public function setTraduction(?string $traduction): static
    {
        $this->traduction = $traduction;

        return $this;
    }
}