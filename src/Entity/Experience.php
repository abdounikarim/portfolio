<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 * @ApiResource()
 */
class Experience
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("hello")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("experience:collection:get")
     */
    private $title;

    /**
     * @ORM\Column(type="date")
     */
    private $started;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $ended;

    /**
     * @ORM\Column(type="text")
     * @Groups("experience:collection:get")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skill", inversedBy="experiences")
     * @Groups("experience:collection:get")
     */
    private $skills;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Image", inversedBy="experiences")
     * @Groups("experience:collection:get")
     */
    private $image;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStarted(): ?\DateTimeInterface
    {
        return $this->started;
    }

    public function setStarted(\DateTimeInterface $started): self
    {
        $this->started = $started;

        return $this;
    }

    public function getEnded(): ?\DateTimeInterface
    {
        return $this->ended;
    }

    public function setEnded(?\DateTimeInterface $ended): self
    {
        $this->ended = $ended;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->contains($skill)) {
            $this->skills->removeElement($skill);
        }

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }
}
