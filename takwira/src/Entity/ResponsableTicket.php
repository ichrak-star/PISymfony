<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ResponsableTicketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ResponsableTicketRepository::class)
 */
class ResponsableTicket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="idResponsableTicket")
     */
    private $idTicket;

    public function __construct()
    {
        $this->idTicket = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getIdTicket(): Collection
    {
        return $this->idTicket;
    }

    public function addIdTicket(Ticket $idTicket): self
    {
        if (!$this->idTicket->contains($idTicket)) {
            $this->idTicket[] = $idTicket;
            $idTicket->setIdResponsableTicket($this);
        }

        return $this;
    }

    public function removeIdTicket(Ticket $idTicket): self
    {
        if ($this->idTicket->removeElement($idTicket)) {
            // set the owning side to null (unless already changed)
            if ($idTicket->getIdResponsableTicket() === $this) {
                $idTicket->setIdResponsableTicket(null);
            }
        }

        return $this;
    }
}
