<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
  *  normalizationContext={"groups"={"comment:read"}},
  *  denormalizationContext={"groups"={"comment:write"}}
  * )
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("comment:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("comment:read")
     * @Groups("comment:write")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("comment:read")
     * @Groups("comment:write")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("comment:read")
     * @Groups("comment:write")
     */
    private $contenue;

    /**
     * @ORM\ManyToOne(targetEntity=Publication::class, cascade={"persist"})
     * @Groups("comment:read")
     * @Groups("comment:write")
     */
    private $publications;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
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

    public function getPublications(): ?Publication
    {
        return $this->publications;
    }

    public function setPublications(?Publication $publications): self
    {
        $this->publications = $publications;

        return $this;
    }
}
