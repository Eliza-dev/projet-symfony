<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbonnementsRepository")
 */
class Abonnements
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $News;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Evenements;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNews(): ?string
    {
        return $this->News;
    }

    public function setNews(string $News): self
    {
        $this->News = $News;

        return $this;
    }

    public function getEvenements(): ?string
    {
        return $this->Evenements;
    }

    public function setEvenements(string $Evenements): self
    {
        $this->Evenements = $Evenements;

        return $this;
    }
}
