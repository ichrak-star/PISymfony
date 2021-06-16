<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contenue;

    /**
     * @ORM\ManyToOne(targetEntity=Publication::class, inversedBy="commentaires")
     */
    private $idPublication;

    /**
     * @ORM\ManyToOne(targetEntity=Abonnee::class, inversedBy="commentaires")
     */
    private $ibAbonnee;

    /**
     * @ORM\ManyToMany(targetEntity=ResponsablePublication::class, inversedBy="idCommentaire")
     */
    private $idResponsablePublication;

    public function __construct()
    {
        $this->idResponsablePublication = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(string $contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getIdPublication(): ?Publication
    {
        return $this->idPublication;
    }

    public function setIdPublication(?Publication $idPublication): self
    {
        $this->idPublication = $idPublication;

        return $this;
    }

    public function getIbAbonnee(): ?Abonnee
    {
        return $this->ibAbonnee;
    }

    public function setIbAbonnee(?Abonnee $ibAbonnee): self
    {
        $this->ibAbonnee = $ibAbonnee;

        return $this;
    }

    /**
     * @return Collection|ResponsablePublication[]
     */
    public function getIdResponsablePublication(): Collection
    {
        return $this->idResponsablePublication;
    }

    public function addIdResponsablePublication(ResponsablePublication $idResponsablePublication): self
    {
        if (!$this->idResponsablePublication->contains($idResponsablePublication)) {
            $this->idResponsablePublication[] = $idResponsablePublication;
        }

        return $this;
    }

    public function removeIdResponsablePublication(ResponsablePublication $idResponsablePublication): self
    {
        $this->idResponsablePublication->removeElement($idResponsablePublication);

        return $this;
    }
}
