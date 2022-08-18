<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BottleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BottleRepository::class)]
#[ApiResource]
class Bottle
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: false), Assert\NotNull(), Assert\NotBlank()]
    private ?string $formatName;

    #[ORM\ManyToOne(targetEntity: Wine::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Wine $wine;

    #[ORM\ManyToOne(targetEntity: Capacity::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Capacity $capacity;

    #[ORM\ManyToOne(targetEntity: BottleStopper::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private BottleStopper $bottleStopper;

    #[ORM\ManyToOne(targetEntity: StorageInstruction::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private StorageInstruction $storageInstruction;

    #[ORM\ManyToOne(targetEntity: Cellar::class, fetch: 'EXTRA_LAZY', inversedBy: 'bottles'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Cellar $cellar;

    public function __toString(): string
    {
        return $this->formatName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWine(): ?Wine
    {
        return $this->wine;
    }

    public function setWine(?Wine $wine): self
    {
        $this->wine = $wine;

        return $this;
    }

    public function getCellar(): ?Cellar
    {
        return $this->cellar;
    }

    public function setCellar(?Cellar $cellar): self
    {
        $this->cellar = $cellar;

        return $this;
    }

    public function getFormatName(): ?string
    {
        return $this->formatName;
    }

    public function setFormatName(string $formatName): self
    {
        $this->formatName = $formatName;

        return $this;
    }

    public function getCapacity(): ?Capacity
    {
        return $this->capacity;
    }

    public function setCapacity(?Capacity $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getBottleStopper(): ?BottleStopper
    {
        return $this->bottleStopper;
    }

    public function setBottleStopper(?BottleStopper $bottleStopper): self
    {
        $this->bottleStopper = $bottleStopper;

        return $this;
    }

    public function getStorageInstruction(): ?StorageInstruction
    {
        return $this->storageInstruction;
    }

    public function setStorageInstruction(?StorageInstruction $storageInstruction): self
    {
        $this->storageInstruction = $storageInstruction;

        return $this;
    }
}
