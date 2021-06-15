<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MatcheRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MatcheRepository::class)
 */
class Matche
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateMatch;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resultat;

    /**
     * @ORM\ManyToOne(targetEntity=Stade::class, inversedBy="matchid")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stadeid;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class, inversedBy="matchid")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competitionid;





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMatch(): ?\DateTimeInterface
    {
        return $this->dateMatch;
    }

    public function setDateMatch(\DateTimeInterface $dateMatch): self
    {
        $this->dateMatch = $dateMatch;

        return $this;
    }

    public function getTour(): ?string
    {
        return $this->tour;
    }

    public function setTour(string $tour): self
    {
        $this->tour = $tour;

        return $this;
    }

    public function getResultat(): ?string
    {
        return $this->resultat;
    }

    public function setResultat(string $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }

    public function getStadeid(): ?Stade
    {
        return $this->stadeid;
    }

    public function setStadeid(?Stade $stadeid): self
    {
        $this->stadeid = $stadeid;

        return $this;
    }

    public function getCompetitionid(): ?Competition
    {
        return $this->competitionid;
    }

    public function setCompetitionid(?Competition $competitionid): self
    {
        $this->competitionid = $competitionid;

        return $this;
    }


}
