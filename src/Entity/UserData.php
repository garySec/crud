<?php

namespace App\Entity;

use App\Repository\UserDataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ContactUser;

/**
 * @ORM\Entity(repositoryClass=UserDataRepository::class)
 */
class UserData
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
    private $gender;

    /**
     * @ORM\OneToOne(targetEntity="ContactUser", inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="contanct_id",nullable=false,referencedColumnName="id")
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity=AddressUser::class, inversedBy="user",cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false,name="addr_id")
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity=UserType::class, inversedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userType;

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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getContact(): ?ContactUser
    {
        return $this->contact;
    }

    public function setContact(ContactUser $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getAddress(): ?AddressUser
    {
        return $this->address;
    }

    public function setAddress(?AddressUser $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getUserType(): ?UserType
    {
        return $this->userType;
    }

    public function setUserType(?UserType $userType): self
    {
        $this->userType = $userType;

        return $this;
    }
}
