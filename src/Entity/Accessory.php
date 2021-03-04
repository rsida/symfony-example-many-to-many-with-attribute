<?php

namespace App\Entity;

use App\Repository\AccessoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccessoryRepository::class)
 */
class Accessory
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
    private $label;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @var LadderAccessory[]|Collection
     * @ORM\OneToMany(targetEntity="App\Entity\LadderAccessory", mappedBy="accessory", cascade={"persist"})
     */
    private $ladderAccessories;

    public function __construct()
    {
        $this->ladderAccessories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLadderAccessories(): Collection
    {
        return $this->ladderAccessories;
    }

    public function setLadderAccessories(Collection $ladderAccessories): self
    {
        $this->ladderAccessories = $ladderAccessories;
        return $this;
    }

    public function addLadderAccessory(LadderAccessory $ladderAccessory): self
    {
        if (!$this->ladderAccessories->contains($ladderAccessory)) {
            $this->ladderAccessories->add($ladderAccessory);
            $ladderAccessory->setAccessory($this);
        }
        return $this;
    }

    public function removeLadderAccessory(LadderAccessory $ladderAccessory): self
    {
        $this->ladderAccessories->removeElement($ladderAccessory);
        return $this;
    }
}
