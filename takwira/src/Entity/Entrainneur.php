<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EntrainneurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EntrainneurRepository::class)
 */
class Entrainneur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Equipe::class, cascade={"persist", "remove"})
     */
    private $idEquipe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEquipe(): ?Equipe
    {
        return $this->idEquipe;
    }

    public function setIdEquipe(?Equipe $idEquipe): self
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }
}
