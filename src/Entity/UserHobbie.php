<?php

namespace App\Entity;

use App\Repository\UserHobbieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=UserHobbieRepository::class)
 */
class UserHobbie
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=2)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hobbie;

    /**
     * @ORM\ManyToMany(targetEntity=UserData::class, mappedBy="hobbie")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function setId(int $id): ?int
    {
        $this->id = $id;
        return $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHobbie(): ?string
    {
        return $this->hobbie;
    }

    public function setHobbie(string $hobbie): self
    {
        $this->hobbie = $hobbie;

        return $this;
    }

    /**
     * @return Collection|UserData[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(UserData $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->addHobbie($this);
        }

        return $this;
    }

    public function removeUser(UserData $user): self
    {
        if ($this->user->removeElement($user)) {
            $user->removeHobbie($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->hobbie;
    }
}