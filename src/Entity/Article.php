<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    *     message="Author Name cannot contain a number"
    * )
    * @Assert\Type("string")
    * @Assert\NotBlank
    * @ORM\Column(type="string", length=255)
    */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $comment;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="article")
     * @ORM\JoinColumn(name="article", referencedColumnName="id")
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    public function setComment(?Comment $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addArticle($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeArticle($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
        return $this->author;
    }
}