<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompetionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompetionRepository::class)
 */
class Competion
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
    private $competionName;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="idCompetition")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Matche::class, mappedBy="competion")
     */
    private $matche;

    public function __construct()
    {
        $this->matche = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompetionName(): ?string
    {
        return $this->competionName;
    }

    public function setCompetionName(string $competionName): self
    {
        $this->competionName = $competionName;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Matche[]
     */
    public function getMatche(): Collection
    {
        return $this->matche;
    }

    public function addMatche(Matche $matche): self
    {
        if (!$this->matche->contains($matche)) {
            $this->matche[] = $matche;
            $matche->setCompetion($this);
        }

        return $this;
    }

    public function removeMatche(Matche $matche): self
    {
        if ($this->matche->removeElement($matche)) {
            // set the owning side to null (unless already changed)
            if ($matche->getCompetion() === $this) {
                $matche->setCompetion(null);
            }
        }

        return $this;
    }
}
