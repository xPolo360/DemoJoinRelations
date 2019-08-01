<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\Relation1Repository")
 */
class Relation1
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relationProperty1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relationProperty2;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Example", mappedBy="relation1")
     */
    private $examples;

    public function __construct()
    {
        $this->examples = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelationProperty1(): ?string
    {
        return $this->relationProperty1;
    }

    public function setRelationProperty1(string $relationProperty1): self
    {
        $this->relationProperty1 = $relationProperty1;

        return $this;
    }

    public function getRelationProperty2(): ?string
    {
        return $this->relationProperty2;
    }

    public function setRelationProperty2(string $relationProperty2): self
    {
        $this->relationProperty2 = $relationProperty2;

        return $this;
    }

    /**
     * @return Collection|Example[]
     */
    public function getExamples(): Collection
    {
        return $this->examples;
    }

    public function addExample(Example $example): self
    {
        if (!$this->examples->contains($example)) {
            $this->examples[] = $example;
            $example->setRelation1($this);
        }

        return $this;
    }

    public function removeExample(Example $example): self
    {
        if ($this->examples->contains($example)) {
            $this->examples->removeElement($example);
            // set the owning side to null (unless already changed)
            if ($example->getRelation1() === $this) {
                $example->setRelation1(null);
            }
        }

        return $this;
    }
}
