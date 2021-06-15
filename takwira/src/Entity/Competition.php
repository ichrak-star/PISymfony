<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompetitionRepository::class)
 */
class Competition
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
    private $nomCompetition;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebutCompetition;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFinCompetion;

    /**
     * @ORM\ManyToOne(targetEntity=Organisateur::class, inversedBy="competitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $organisateurs;

    /**
     * @ORM\OneToMany(targetEntity=Matche::class, mappedBy="competitionid")
     */
    private $matchid;

    public function __construct()
    {
        $this->matchid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompetition(): ?string
    {
        return $this->nomCompetition;
    }

    public function setNomCompetition(string $nomCompetition): self
    {
        $this->nomCompetition = $nomCompetition;

        return $this;
    }

    public function getDateDebutCompetition(): ?\DateTimeInterface
    {
        return $this->dateDebutCompetition;
    }

    public function setDateDebutCompetition(\DateTimeInterface $dateDebutCompetition): self
    {
        $this->dateDebutCompetition = $dateDebutCompetition;

        return $this;
    }

    public function getDateFinCompetion(): ?\DateTimeInterface
    {
        return $this->dateFinCompetion;
    }

    public function setDateFinCompetion(\DateTimeInterface $dateFinCompetion): self
    {
        $this->dateFinCompetion = $dateFinCompetion;

        return $this;
    }

    public function getOrganisateurs(): ?Organisateur
    {
        return $this->organisateurs;
    }

    public function setOrganisateurs(?Organisateur $organisateurs): self
    {
        $this->organisateurs = $organisateurs;

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
            $matchid->setCompetitionid($this);
        }

        return $this;
    }

    public function removeMatchid(Matche $matchid): self
    {
        if ($this->matchid->removeElement($matchid)) {
            // set the owning side to null (unless already changed)
            if ($matchid->getCompetitionid() === $this) {
                $matchid->setCompetitionid(null);
            }
        }

        return $this;
    }
}
