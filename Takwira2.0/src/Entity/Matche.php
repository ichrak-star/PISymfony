<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MatcheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $result;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $round;

    /**
     * @ORM\ManyToOne(targetEntity=Competion::class, inversedBy="matche")
     */
    private $competion;

    /**
     * @ORM\ManyToOne(targetEntity=Staduim::class, inversedBy="matche")
     */
    private $staduim;

    /**
     * @ORM\OneToMany(targetEntity=Team::class, mappedBy="matche")
     */
    private $team;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="matche")
     */
    private $ticket;

    public function __construct()
    {
        $this->team = new ArrayCollection();
        $this->ticket = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(string $result): self
    {
        $this->result = $result;

        return $this;
    }

    public function getRound(): ?string
    {
        return $this->round;
    }

    public function setRound(string $round): self
    {
        $this->round = $round;

        return $this;
    }

    public function getCompetion(): ?Competion
    {
        return $this->competion;
    }

    public function setCompetion(?Competion $competion): self
    {
        $this->competion = $competion;

        return $this;
    }

    public function getStaduim(): ?Staduim
    {
        return $this->staduim;
    }

    public function setStaduim(?Staduim $staduim): self
    {
        $this->staduim = $staduim;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeam(): Collection
    {
        return $this->team;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->team->contains($team)) {
            $this->team[] = $team;
            $team->setMatche($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->team->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getMatche() === $this) {
                $team->setMatche(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTicket(): Collection
    {
        return $this->ticket;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->ticket->contains($ticket)) {
            $this->ticket[] = $ticket;
            $ticket->setMatche($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->ticket->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getMatche() === $this) {
                $ticket->setMatche(null);
            }
        }

        return $this;
    }
}
