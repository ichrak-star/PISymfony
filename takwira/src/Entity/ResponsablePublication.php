<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ResponsablePublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ResponsablePublicationRepository::class)
 */
class ResponsablePublication extends Personne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Publication::class, mappedBy="responsablePublication")
     */
    private $idPublication;

    /**
     * @ORM\ManyToMany(targetEntity=Commentaire::class, mappedBy="idResponsablePublication")
     */
    private $idCommentaire;

    public function __construct()
    {
        $this->idPublication = new ArrayCollection();
        $this->idCommentaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Publication[]
     */
    public function getIdPublication(): Collection
    {
        return $this->idPublication;
    }

    public function addIdPublication(Publication $idPublication): self
    {
        if (!$this->idPublication->contains($idPublication)) {
            $this->idPublication[] = $idPublication;
            $idPublication->setResponsablePublication($this);
        }

        return $this;
    }

    public function removeIdPublication(Publication $idPublication): self
    {
        if ($this->idPublication->removeElement($idPublication)) {
            // set the owning side to null (unless already changed)
            if ($idPublication->getResponsablePublication() === $this) {
                $idPublication->setResponsablePublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getIdCommentaire(): Collection
    {
        return $this->idCommentaire;
    }

    public function addIdCommentaire(Commentaire $idCommentaire): self
    {
        if (!$this->idCommentaire->contains($idCommentaire)) {
            $this->idCommentaire[] = $idCommentaire;
            $idCommentaire->addIdResponsablePublication($this);
        }

        return $this;
    }

    public function removeIdCommentaire(Commentaire $idCommentaire): self
    {
        if ($this->idCommentaire->removeElement($idCommentaire)) {
            $idCommentaire->removeIdResponsablePublication($this);
        }

        return $this;
    }
}
