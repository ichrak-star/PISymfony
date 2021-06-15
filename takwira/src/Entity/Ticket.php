<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroTicket;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeTicket;

    /**
     * @ORM\Column(type="boolean")
     */
    private $venduTicket;

    /**
     * @ORM\ManyToOne(targetEntity=ResponsableTicket::class, inversedBy="idTicket")
     */
    private $idResponsableTicket;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroTicket(): ?int
    {
        return $this->numeroTicket;
    }

    public function setNumeroTicket(int $numeroTicket): self
    {
        $this->numeroTicket = $numeroTicket;

        return $this;
    }

    public function getTypeTicket(): ?string
    {
        return $this->typeTicket;
    }

    public function setTypeTicket(string $typeTicket): self
    {
        $this->typeTicket = $typeTicket;

        return $this;
    }

    public function getVenduTicket(): ?bool
    {
        return $this->venduTicket;
    }

    public function setVenduTicket(bool $venduTicket): self
    {
        $this->venduTicket = $venduTicket;

        return $this;
    }

    public function getIdResponsableTicket(): ?ResponsableTicket
    {
        return $this->idResponsableTicket;
    }

    public function setIdResponsableTicket(?ResponsableTicket $idResponsableTicket): self
    {
        $this->idResponsableTicket = $idResponsableTicket;

        return $this;
    }
}
