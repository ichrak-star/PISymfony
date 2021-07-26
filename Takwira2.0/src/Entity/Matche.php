<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MatcheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $result;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $equipe1;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $equipe2;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $stade;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $arbitre;


    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="matche")
     */
    private $tickets;
    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getEquipe1(): ?string
    {
        return $this->equipe1;
    }

    public function setEquipe1(string $equipe1): self
    {
        $this->equipe1 = $equipe1;

        return $this;
    }

    public function getEquipe2(): ?string
    {
        return $this->equipe2;
    }

    public function setEquipe2(string $equipe2): self
    {
        $this->equipe2 = $equipe2;

        return $this;
    }

    public function getStade(): ?string
    {
        return $this->stade;
    }

    public function setStade(string $stade): self
    {
        $this->stade = $stade;

        return $this;
    }

    public function getArbitre(): ?string
    {
        return $this->arbitre;
    }

    public function setArbitre(string $arbitre): self
    {
        $this->arbitre = $arbitre;

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTickets(Ticket $tickets): self
    {
        if (!$this->tickets->contains($tickets)) {
            $this->tickets[] = $tickets;
            $tickets->setTicket($this);
        }

        return $this;
    }

    public function removeTickets(Ticket $tickets): self
    {
        if ($this->tickets->removeElement($tickets)) {
            // set the owning side to null (unless already changed)
            if ($tickets->geTicket() === $this) {
                $tickets->setTicket(null);
            }
        }

        return $this;
    }

}
