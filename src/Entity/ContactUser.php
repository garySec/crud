<?php

namespace App\Entity;

use App\Repository\ContactUserRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\UserData;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactUserRepository::class)
 */
class ContactUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @Assert\Length(
    *      min = 10,
    *      max = 10,
    *      minMessage = "Your Mobile must be at least {{ limit }} characters long",
    *      maxMessage = "Your Mobile cannot be longer than {{ limit }} characters"
    * )
    *@Assert\NotBlank
    * @ORM\Column(type="string", length=255)
    */
    private $mobile;

    /**
    * @Assert\Email(
    *     message = "The email '{{ value }}' is not a valid email."
    * )
    *@Assert\NotBlank 
    * @ORM\Column(type="string", length=255)
    */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="UserData", mappedBy="contact",cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): self
    {
        $this->mobile = $mobile;

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

    public function getUser(): ?UserData
    {
        return $this->user;
    }

    public function setUser(?UserData $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setContact(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getContact() !== $this) {
            $user->setContact($this);
        }

        $this->user = $user;

        return $this;
    }

    public function __toString()
    {
        return $this->mobile;
    }
}
