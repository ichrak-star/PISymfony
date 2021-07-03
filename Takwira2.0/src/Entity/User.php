<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
  *     normalizationContext={"groups"={"user:read"}},
  *     denormalizationContext={"groups"={"user:write"}}
  * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("user:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $post;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $tshirtNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $level;



    /**
     * @ORM\Column(type="string", length=255)
      * @Groups("user:read")
      * @Groups("user:write")
     */
    private $role;



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


    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
}
