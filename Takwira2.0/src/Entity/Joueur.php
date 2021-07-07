<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JoueurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
   *     normalizationContext={"groups"={"joueur:read"}},
   *     denormalizationContext={"groups"={"joueur:write"}}
   * )
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("joueur:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("joueur:read")
     * @Groups("joueur:write")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("joueur:read")
     * @Groups("joueur:write")
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("joueur:read")
     * @Groups("joueur:write")
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("joueur:read")
     * @Groups("joueur:write")
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("joueur:read")
     * @Groups("joueur:write")
     */
    private $size;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("joueur:read")
     * @Groups("joueur:write")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="joueurs")
     */
    private $team;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }
}
