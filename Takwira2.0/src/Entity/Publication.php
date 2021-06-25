<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="idPublication")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="publication")
     */
    private $idComment;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="publication")
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity=Video::class, mappedBy="publication")
     */
    private $video;

    public function __construct()
    {
        $this->idComment = new ArrayCollection();
        $this->photo = new ArrayCollection();
        $this->video = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublication(): ?User
    {
        return $this->Publication;
    }

    public function setPublication(?User $Publication): self
    {
        $this->Publication = $Publication;

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
     * @return Collection|Comment[]
     */
    public function getIdComment(): Collection
    {
        return $this->idComment;
    }

    public function addIdComment(Comment $idComment): self
    {
        if (!$this->idComment->contains($idComment)) {
            $this->idComment[] = $idComment;
            $idComment->setPublication($this);
        }

        return $this;
    }

    public function removeIdComment(Comment $idComment): self
    {
        if ($this->idComment->removeElement($idComment)) {
            // set the owning side to null (unless already changed)
            if ($idComment->getPublication() === $this) {
                $idComment->setPublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }

    public function addPhoto(Picture $photo): self
    {
        if (!$this->photo->contains($photo)) {
            $this->photo[] = $photo;
            $photo->setPublication($this);
        }

        return $this;
    }

    public function removePhoto(Picture $photo): self
    {
        if ($this->photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getPublication() === $this) {
                $photo->setPublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|video[]
     */
    public function getVideo(): Collection
    {
        return $this->video;
    }

    public function addVideo(video $video): self
    {
        if (!$this->video->contains($video)) {
            $this->video[] = $video;
            $video->setPublication($this);
        }

        return $this;
    }

    public function removeVideo(video $video): self
    {
        if ($this->video->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getPublication() === $this) {
                $video->setPublication(null);
            }
        }

        return $this;
    }
}
