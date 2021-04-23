<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 */
class Property
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=5)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=5)
     */
    private $longitude;

    /**
     * @ORM\Column(type="integer")
     */
    private $bedrooms;

    /**
     * @ORM\Column(type="point")
     */
    private $point;

    /**
     * @ORM\OneToMany(targetEntity=Enquire::class, mappedBy="property")
     */
    private $enquires;

    public function __construct()
    {
        $this->enquires = new ArrayCollection();
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

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getBedrooms(): ?int
    {
        return $this->bedrooms;
    }

    public function setBedrooms(int $bedrooms): self
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    public function getPoint()
    {
        return $this->point;
    }

    public function setPoint($point): self
    {
        $this->point = $point;

        return $this;
    }

    /**
     * @return Collection|Enquire[]
     */
    public function getEnquires(): Collection
    {
        return $this->enquires;
    }

    public function addEnquire(Enquire $enquire): self
    {
        if (!$this->enquires->contains($enquire)) {
            $this->enquires[] = $enquire;
            $enquire->setProperty($this);
        }

        return $this;
    }

    public function removeEnquire(Enquire $enquire): self
    {
        if ($this->enquires->removeElement($enquire)) {
            // set the owning side to null (unless already changed)
            if ($enquire->getProperty() === $this) {
                $enquire->setProperty(null);
            }
        }

        return $this;
    }
}
