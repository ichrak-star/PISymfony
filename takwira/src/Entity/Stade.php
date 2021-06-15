<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StadeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=StadeRepository::class)
 */
class Stade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomStade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\OneToMany(targetEntity=Matche::class, mappedBy="stadeid")
     */
    private $matchid;




    public function __construct()
    {
        $this->stades = new ArrayCollection();
        $this->matchid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStade(): ?string
    {
        return $this->nomStade;
    }

    public function setNomStade(string $nomStade): self
    {
        $this->nomStade = $nomStade;

        return $this;
    }



    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * @return Collection|Matche[]
     */
    public function getStades(): Collection
    {
        return $this->stades;
    }

    public function addStade(Matche $stade): self
    {
        if (!$this->stades->contains($stade)) {
            $this->stades[] = $stade;
            $stade->setMatches($this);
        }

        return $this;
    }

    public function removeStade(Matche $stade): self
    {
        if ($this->stades->removeElement($stade)) {
            // set the owning side to null (unless already changed)
            if ($stade->getMatches() === $this) {
                $stade->setMatches(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Matche[]
     */
    public function getMatchid(): Collection
    {
        return $this->matchid;
    }

    public function addMatchid(Matche $matchid): self
    {
        if (!$this->matchid->contains($matchid)) {
            $this->matchid[] = $matchid;
            $matchid->setStadeid($this);
        }

        return $this;
    }

    public function removeMatchid(Matche $matchid): self
    {
        if ($this->matchid->removeElement($matchid)) {
            // set the owning side to null (unless already changed)
            if ($matchid->getStadeid() === $this) {
                $matchid->setStadeid(null);
            }
        }

        return $this;
    }
}
