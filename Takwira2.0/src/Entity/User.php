<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
  *     normalizationContext={"groups"={"user:read"}},
  *     denormalizationContext={"groups"={"user:write"}}
  * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements \Serializable
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

 /*     *//**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     *//*
    private $post;

     *//**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     *//*
    private $tshirtNumber;

     *//**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     *//*
    private $size;

     *//**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     *//*
    private $weight;

     *//**
     * @ORM\Column(type="string", length=255, nullable=true)
      * @Groups("user:read")
      * @Groups("user:write")
     *//*
    private $level;

 */

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


    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function serialize()
    {
        return $this->serialize([
            $this->id,
            $this->name,
            $this->lastname,
            $this->password,
            $this->email,
            $this->adress,
            $this->role
        ]);
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->name,
            $this->lastname,
            $this->password,
            $this->email,
            $this->adress,
            $this->role
            )= $this->unserialize($serialized, ['allowed_classes' => false]);
    }
}
