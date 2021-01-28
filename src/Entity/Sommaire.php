<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SommaireRepository")
 */
class Sommaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ajout;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAjout(): ?string
    {
        return $this->ajout;
    }

    public function setAjout(?string $ajout): self
    {
        $this->ajout = $ajout;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(?string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }
}
