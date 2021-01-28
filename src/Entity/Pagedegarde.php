<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PagedegardeRepository")
 */
class Pagedegarde
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
    private $numero_copieoriginal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_copie1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_copie2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_copie3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_copie4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_copie5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_copiebureau;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $visualiser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_etablissement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCopieoriginal(): ?string
    {
        return $this->numero_copieoriginal;
    }

    public function setNumeroCopieoriginal(string $numero_copieoriginal): self
    {
        $this->numero_copieoriginal = $numero_copieoriginal;

        return $this;
    }

    public function getNumeroCopie1(): ?string
    {
        return $this->numero_copie1;
    }

    public function setNumeroCopie1(string $numero_copie1): self
    {
        $this->numero_copie1 = $numero_copie1;

        return $this;
    }

    public function getNumeroCopie2(): ?string
    {
        return $this->numero_copie2;
    }

    public function setNumeroCopie2(string $numero_copie2): self
    {
        $this->numero_copie2 = $numero_copie2;

        return $this;
    }

    public function getNumeroCopie3(): ?string
    {
        return $this->numero_copie3;
    }

    public function setNumeroCopie3(string $numero_copie3): self
    {
        $this->numero_copie3 = $numero_copie3;

        return $this;
    }

    public function getNumeroCopie4(): ?string
    {
        return $this->numero_copie4;
    }

    public function setNumeroCopie4(string $numero_copie4): self
    {
        $this->numero_copie4 = $numero_copie4;

        return $this;
    }

    public function getNumeroCopie5(): ?string
    {
        return $this->numero_copie5;
    }

    public function setNumeroCopie5(string $numero_copie5): self
    {
        $this->numero_copie5 = $numero_copie5;

        return $this;
    }

    public function getNumeroCopiebureau(): ?string
    {
        return $this->numero_copiebureau;
    }

    public function setNumeroCopiebureau(string $numero_copiebureau): self
    {
        $this->numero_copiebureau = $numero_copiebureau;

        return $this;
    }

    public function getVisualiser(): ?string
    {
        return $this->visualiser;
    }

    public function setVisualiser(string $visualiser): self
    {
        $this->visualiser = $visualiser;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
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
}
