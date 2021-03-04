<?php

namespace App\Entity;

use App\Repository\LadderAccessoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LadderAccessoryRepository::class)
 */
class LadderAccessory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @var Ladder
     * @ORM\ManyToOne(targetEntity="App\Entity\Ladder", inversedBy="ladderAccessories", cascade={"persist"})
     * @ORM\JoinColumn(name="ladder_id", referencedColumnName="id")
     */
    private $ladder;

    /**
     * @var Accessory
     * @ORM\ManyToOne(targetEntity="App\Entity\Accessory", inversedBy="ladderAccessories", cascade={"persist"})
     * @ORM\JoinColumn(name="accessory_id", referencedColumnName="id", nullable=true)
     */
    private $accessory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getLadder(): ?Ladder
    {
        return $this->ladder;
    }

    public function setLadder(Ladder $ladder): self
    {
        $this->ladder = $ladder;
        return $this;
    }

    public function getAccessory(): ?Accessory
    {
        return $this->accessory;
    }

    public function setAccessory(Accessory $accessory): self
    {
        $this->accessory = $accessory;
        return $this;
    }
}
