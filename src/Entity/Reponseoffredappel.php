<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReponseoffredappelRepository")
 */
class Reponseoffredappel
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
    private $nomEntreprise;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $offreFinancier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Offredappel", inversedBy="reponses")
     */
    private $offredappel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type_diagramme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(?string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getOffreFinancier(): ?int
    {
        return $this->offreFinancier;
    }

    public function setOffreFinancier(?int $offreFinancier): self
    {
        $this->offreFinancier = $offreFinancier;

        return $this;
    }

    public function getOffredappel(): ?Offredappel
    {
        return $this->offredappel;
    }

    public function setOffredappel(?Offredappel $offredappel): self
    {
        $this->offredappel = $offredappel;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getTypeDiagramme(): ?string
    {
        return $this->type_diagramme;
    }

    public function setTypeDiagramme(?string $type_diagramme): self
    {
        $this->type_diagramme = $type_diagramme;

        return $this;
    }
}
