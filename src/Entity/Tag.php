<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
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
    *     message="Your Tag cannot contain a number"
    * )
    * @Assert\Type("string")
    * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $tag;

    /**
     * @Assert\Range(
     *      min = 0,
     *      max = 10,
     *      notInRangeMessage = "You must be between {{ min }} and {{ max }} rate to enter",
     * )
    * @Assert\NotBlank
     * @ORM\Column(type="integer")
     */
    private $rate;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, inversedBy="tags")
     * @ORM\JoinColumn(name="tags", referencedColumnName="id")
     */
    private $article;

    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        $this->article->removeElement($article);

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

}