<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"matche:read"}},
 *     denormalizationContext={"groups"={"matche:write"}}
  * )
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("matche:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $number;


    /**
     * @ORM\ManyToOne(targetEntity=Matche::class)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $matche;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("matche:read")
     * @Groups("matche:write")
     */
    private $typeTicket;



    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getMatche(): ?Matche
    {
        return $this->matche;
    }

    public function setMatche(?Matche $matche): self
    {
        $this->matche = $matche;

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



}
