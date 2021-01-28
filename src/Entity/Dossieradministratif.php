<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DossieradministratifRepository")
 */
class Dossieradministratif
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
    private $nom_etablissement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero_offre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtablissement(): ?string
    {
        return $this->nom_etablissement;
    }

    public function setNomEtablissement(?string $nom_etablissement): self
    {
        $this->nom_etablissement = $nom_etablissement;

        return $this;
    }

    public function getNumeroOffre(): ?string
    {
        return $this->numero_offre;
    }

    public function setNumeroOffre(?string $numero_offre): self
    {
        $this->numero_offre = $numero_offre;

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
