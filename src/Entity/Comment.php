<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
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
    *     message="Your Name cannot contain a number"
    * )
    * @Assert\Type("string")
    * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
    * @Assert\Regex(
    *     pattern="/[a-zA-Z]+/i",
    *     match=true,
    *     message="Your Description cannot contain a number"
    * )
    * @Assert\Type("string")
    * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $discription;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="comment")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
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

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(string $discription): self
    {
        $this->discription = $discription;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setComment($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getComment() === $this) {
                $article->setComment(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
