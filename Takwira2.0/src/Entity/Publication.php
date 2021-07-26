<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PublicationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 */
class Publication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("comment:read")
     */
    private $id;


    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("comment:read")
     * @Groups("comment:write")
     */
    private $nbrCommentaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("comment:read")
     * @Groups("comment:write")
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("comment:read")
     * @Groups("comment:write")
     */
    private $videoPub;


    /**
     * @ORM\Column(type="text")
     * @Groups("comment:read")
     * @Groups("comment:write")
     */
    private $contenuePub;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNbrCommentaire(): ?int
    {
        return $this->nbrCommentaire;
    }

    public function setNbrCommentaire(?int $nbrCommentaire): self
    {
        $this->nbrCommentaire = $nbrCommentaire;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getVideoPub(): ?string
    {
        return $this->videoPub;
    }

    public function setVideoPub(?string $videoPub): self
    {
        $this->videoPub = $videoPub;

        return $this;
    }



    public function getContenuePub(): ?string
    {
        return $this->contenuePub;
    }

    public function setContenuePub(string $contenuePub): self
    {
        $this->contenuePub = $contenuePub;

        return $this;
    }


}
