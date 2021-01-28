<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffredappelRepository")
 */
class Offredappel
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
    private $numeroOffre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reponseoffredappel", mappedBy="offredappel")
     */
    private $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroOffre(): ?string
    {
        return $this->numeroOffre;
    }

    public function setNumeroOffre(?string $numeroOffre): self
    {
        $this->numeroOffre = $numeroOffre;

        return $this;
    }

    /**
     * @return Collection|Reponseoffredappel[]
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponseoffredappel $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
            $reponse->setOffredappel($this);
        }

        return $this;
    }

    public function removeReponse(Reponseoffredappel $reponse): self
    {
        if ($this->reponses->contains($reponse)) {
            $this->reponses->removeElement($reponse);
            // set the owning side to null (unless already changed)
            if ($reponse->getOffredappel() === $this) {
                $reponse->setOffredappel(null);
            }
        }

        return $this;
    }
}
