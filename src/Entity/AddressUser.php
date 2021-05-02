<?php

namespace App\Entity;

use App\Repository\AddressUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AddressUserRepository::class)
 */
class AddressUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
    * @Assert\Regex(
    *     pattern="/[a-zA-Z]+/i",
    *     match=true,
    *     message="Your name cannot contain a number"
    * )
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $fullname;
    
    /**
     * @Assert\Range(
     *      min = 6,
     *      max = 6,
     *      notInRangeMessage = "Pincode must be {{ min }}.",
     * )
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $pincode;

    /**
     * @ORM\ManyToOne(targetEntity=UserData::class, inversedBy="address")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userData;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getPincode(): ?string
    {
        return $this->pincode;
    }

    public function setPincode(string $pincode): self
    {
        $this->pincode = $pincode;

        return $this;
    }

    public function getUserData(): ?UserData
    {
        return $this->userData;
    }

    public function setUserData(?UserData $userData): self
    {
        $this->userData = $userData;

        return $this;
    }
}