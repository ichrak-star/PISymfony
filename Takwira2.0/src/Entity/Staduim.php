<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StaduimRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=StaduimRepository::class)
 */
class Staduim
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
    private $staduimName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStaduimName(): ?string
    {
        return $this->staduimName;
    }

    public function setStaduimName(string $staduimName): self
    {
        $this->staduimName = $staduimName;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

}
