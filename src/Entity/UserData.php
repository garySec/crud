<?php

namespace App\Entity;

use App\Repository\UserDataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ContactUser;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Regex(
     *     pattern="/[a-zA-Z]+/i",
     *     match=true,
     *     message="Your name cannot contain a number"
     * )
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Assert\Regex(
     *     pattern="/[a-zA-Z]+/i",
     *     match=true,
     *     message="Your lastname cannot contain a number"
     * )
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @Assert\Valid
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\OneToOne(targetEntity="ContactUser", inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="contanct_id",nullable=false,referencedColumnName="id")
     * @Assert\Valid
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity=AddressUser::class, inversedBy="user",cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false,name="addr_id")
     * @Assert\Valid
     */
    private $address;

    /**
     * @Assert\Valid
     * @ORM\ManyToOne(targetEntity=UserType::class, inversedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userType;

    /**
     * @Assert\Valid
     * @ORM\ManyToMany(targetEntity=UserHobbie::class, inversedBy="user")
     * @ORM\JoinColumn(name="hobbie_id", referencedColumnName="id")
     */
    private $hobbie;

    public function __construct()
    {
        $this->hobbie = new ArrayCollection();
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

    /**
     * @return Collection|UserHobbie[]
     */
    public function getHobbie(): Collection
    {
        return $this->hobbie;
    }

    public function addHobbie(UserHobbie $hobbie): self
    {
        if (!$this->hobbie->contains($hobbie)) {
            $this->hobbie[] = $hobbie;
        }

        return $this;
    }

    public function removeHobbie(UserHobbie $hobbie): self
    {
        $this->hobbie->removeElement($hobbie);

        return $this;
    }
}
