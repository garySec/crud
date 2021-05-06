<?php

namespace App\Entity;

use App\Repository\UserTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserTypeRepository::class)
 */
class UserType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=2)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=UserData::class, mappedBy="userType", orphanRemoval=true)
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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
            $user->setUserType($this);
        }

        return $this;
    }

    public function removeUser(UserData $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUserType() === $this) {
                $user->setUserType(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->type;
    }
}