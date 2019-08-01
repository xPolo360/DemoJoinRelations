<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\Relation2Repository")
 */
class Relation2
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Example", inversedBy="relation2")
     */
    private $example;

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

    public function getExample(): ?Example
    {
        return $this->example;
    }

    public function setExample(?Example $example): self
    {
        $this->example = $example;

        return $this;
    }
}
