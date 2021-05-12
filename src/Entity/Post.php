<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

    /**
    * @ORM\Entity(repositoryClass=PostRepository::class)
    */
class Post
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    protected $id;

    /**
    * @Assert\Regex(
    *     pattern="/^[a-zA-Z]+$/i",
    *     message="Your Name cannot contain a number"
    * )
    * @Assert\Type("string")
    * @Assert\NotBlank
    * @ORM\Column(type="string", length=255)
    */
    protected $FristName;

    /**
    * @Assert\Regex(
    *     pattern="/^[a-zA-Z]+$/i",
    *     message="Your Last name cannot contain a number"
    * )
    *@Assert\NotBlank
    * @ORM\Column(type="string", length=255)
    */
    protected $LastName;

    /**
    * @Assert\Email(
    *     message = "The email '{{ value }}' is not a valid email."
    * )
    *@Assert\NotBlank 
    * @ORM\Column(type="string", length=255)
    */
    protected $Email;

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
    protected $Mobile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFristName(): ?string
    {
        return $this->FristName;
    }

    public function setFristName(string $FristName): self
    {
        $this->FristName = $FristName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->Mobile;
    }

    public function setMobile(string $Mobile): self
    {
        $this->Mobile = $Mobile;

        return $this;
    }
}
