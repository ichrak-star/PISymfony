<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $post;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tshirtNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $level;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="user")
     */
    private $idTicket;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="idUser")
     */
    private $team;

    /**
     * @ORM\OneToMany(targetEntity=Competion::class, mappedBy="user")
     */
    private $idCompetition;

    /**
     * @ORM\OneToMany(targetEntity=Publication::class, mappedBy="user")
     */
    private $idPublication;

    /**
     * @ORM\OneToMany(targetEntity=comment::class, mappedBy="user")
     */
    private $comment;




    public function __construct()
    {
        $this->idTicket = new ArrayCollection();
        $this->idCompetition = new ArrayCollection();
        $this->idPublication = new ArrayCollection();
        $this->comment = new ArrayCollection();
    }

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPost(): ?string
    {
        return $this->post;
    }

    public function setPost(?string $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getTshirtNumber(): ?string
    {
        return $this->tshirtNumber;
    }

    public function setTshirtNumber(?string $tshirtNumber): self
    {
        $this->tshirtNumber = $tshirtNumber;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getIdTicket(): Collection
    {
        return $this->idTicket;
    }

    public function addIdTicket(Ticket $idTicket): self
    {
        if (!$this->idTicket->contains($idTicket)) {
            $this->idTicket[] = $idTicket;
            $idTicket->setUser($this);
        }

        return $this;
    }

    public function removeIdTicket(Ticket $idTicket): self
    {
        if ($this->idTicket->removeElement($idTicket)) {
            // set the owning side to null (unless already changed)
            if ($idTicket->getUser() === $this) {
                $idTicket->setUser(null);
            }
        }

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

    /**
     * @return Collection|Competion[]
     */
    public function getIdCompetition(): Collection
    {
        return $this->idCompetition;
    }

    public function addIdCompetition(Competion $idCompetition): self
    {
        if (!$this->idCompetition->contains($idCompetition)) {
            $this->idCompetition[] = $idCompetition;
            $idCompetition->setUser($this);
        }

        return $this;
    }

    public function removeIdCompetition(Competion $idCompetition): self
    {
        if ($this->idCompetition->removeElement($idCompetition)) {
            // set the owning side to null (unless already changed)
            if ($idCompetition->getUser() === $this) {
                $idCompetition->setUser(null);
            }
        }

        return $this;
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
            $idPublication->setPublication($this);
        }

        return $this;
    }

    public function removeIdPublication(Publication $idPublication): self
    {
        if ($this->idPublication->removeElement($idPublication)) {
            // set the owning side to null (unless already changed)
            if ($idPublication->getPublication() === $this) {
                $idPublication->setPublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|comment[]
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(comment $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
        }

        return $this;
    }

    public function removeComment(comment $comment): self
    {
        $this->comment->removeElement($comment);

        return $this;
    }
}
