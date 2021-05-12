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
    *     pattern="/^[a-zA-Z]+$/i",
    *     message="Your Name cannot contain a number"
    * )
    * @Assert\Type("string")
    * @Assert\NotBlank
    * @ORM\Column(type="string", length=255)
    */
    private $name;

    /**
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z]+$/i",
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
     * @Assert\Valid()
     */
    private $contact;

     /**
     * @Assert\Valid
     * @ORM\ManyToOne(targetEntity=UserType::class, inversedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userType;

    /**
     * @Assert\Valid()
     * @ORM\ManyToMany(targetEntity=UserHobbie::class, inversedBy="user")
     * @ORM\JoinColumn(name="hobbie_id", referencedColumnName="id")
     */
    private $hobbie;

    /**
     * @ORM\OneToMany(targetEntity=AddressUser::class, mappedBy="userData",cascade={"persist", "remove"})
     * Assert/Valid()
     */
    private $addr;

    public function __construct()
    {
        $this->addr = new ArrayCollection();
        $this->hobbie = new ArrayCollection();
    }

    /**
     * @return Collection|AddressUser[]
     */
    public function getAddr(): Collection
    {
        return $this->addr;
    }

    public function addAddr(AddressUser $addr): self
    {
        if (!$this->addr->contains($addr)) {
            $this->addr[] = $addr;
            $addr->setUserData($this);
        }

        return $this;
    }

    public function removeAddr(AddressUser $addr): self
    {
        if ($this->addr->removeElement($addr)) {
            // set the owning side to null (unless already changed)
            if ($addr->getUserData() === $this) {
                $addr->setUserData(null);
            }
        }

        return $this;
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