<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ApiFilter(OrderFilter::class, properties={"relation2.relationProperty1"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity(repositoryClass="App\Repository\ExampleRepository")
 */
class Example
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
    private $property1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $property2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Relation1", inversedBy="examples", cascade={"persist"})
     */
    private $relation1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Relation2", mappedBy="example", cascade={"persist"})
     */
    private $relation2;

    public function __construct()
    {
        $this->relation2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProperty1(): ?string
    {
        return $this->property1;
    }

    public function setProperty1(string $property1): self
    {
        $this->property1 = $property1;

        return $this;
    }

    public function getProperty2(): ?string
    {
        return $this->property2;
    }

    public function setProperty2(string $property2): self
    {
        $this->property2 = $property2;

        return $this;
    }

    public function getRelation1(): ?Relation1
    {
        return $this->relation1;
    }

    public function setRelation1(?Relation1 $relation1): self
    {
        $this->relation1 = $relation1;

        return $this;
    }

    /**
     * @return Collection|Relation2[]
     */
    public function getRelation2(): Collection
    {
        return $this->relation2;
    }

    public function addRelation2(Relation2 $relation2): self
    {
        if (!$this->relation2->contains($relation2)) {
            $this->relation2[] = $relation2;
            $relation2->setExample($this);
        }

        return $this;
    }

    public function removeRelation2(Relation2 $relation2): self
    {
        if ($this->relation2->contains($relation2)) {
            $this->relation2->removeElement($relation2);
            // set the owning side to null (unless already changed)
            if ($relation2->getExample() === $this) {
                $relation2->setExample(null);
            }
        }

        return $this;
    }
}
