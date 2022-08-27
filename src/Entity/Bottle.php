<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use App\Repository\BottleRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BottleRepository::class)]
#[ApiResource(
    collectionOperations: ['get', 'post'],
    itemOperations: ['get', 'put', 'patch'],
    normalizationContext: [
        'skip_null_values' => false,
        'groups' => ['read.bottle'],
    ]
)]
#[ApiFilter(
    SearchFilter::class, properties: [
    'id' => 'exact', 'position' => 'exact', 'wine' => 'exact', 'cellar.id' => 'exact']
)]
#[ApiFilter(
    ExistsFilter::class, properties: [
        'emptyAt'
    ]
)]
#[ApiFilter(
    BooleanFilter::class, properties: [
        'isLiked', 'cellar.isActive'
    ]
)]
class Bottle
{
    use TimestampableEntity;
    use BlameableEntity;

    #[ORM\Id, ORM\GeneratedValue, ORM\Column, Groups('read.bottle')]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: false), Groups('read.bottle')]
    private ?string $formatName;

    #[ORM\Column(type: Types::STRING, nullable: true), Groups('read.bottle')]
    private ?string $position;

    #[ORM\Column(type: Types::STRING, nullable: false), Groups('read.bottle')]
    private ?string $familyCode;

    #[ORM\Column(type: Types::FLOAT, nullable: true), Groups('read.bottle')]
    private ?float $purchasePrice;

    #[ORM\Column(type: Types::TEXT, nullable: true), Groups('read.bottle')]
    private ?string $comment;

    #[ORM\Column(type: Types::BOOLEAN, nullable: false), Groups('read.bottle')]
    private ?bool $isLiked;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true), Groups('read.bottle')]
    private ?DateTimeImmutable $purchaseAt;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true), Groups('read.bottle')]
    private ?DateTimeImmutable $emptyAt;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true), Groups('read.bottle')]
    private ?DateTimeImmutable $peakAt;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true), Groups('read.bottle')]
    private ?DateTimeImmutable $alertAt;

    #[ORM\ManyToOne(targetEntity: Wine::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank(), Groups('read.bottle')]
    #[ORM\JoinColumn(nullable: false)]
    private Wine $wine;

    #[ORM\ManyToOne(targetEntity: Capacity::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank(), Groups('read.bottle')]
    #[ORM\JoinColumn(nullable: false)]
    private Capacity $capacity;

    #[ORM\ManyToOne(targetEntity: BottleStopper::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank(), Groups('read.bottle')]
    #[ORM\JoinColumn(nullable: false)]
    private BottleStopper $bottleStopper;

    #[ORM\ManyToOne(targetEntity: StorageInstruction::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank(), Groups('read.bottle')]
    #[ORM\JoinColumn(nullable: false)]
    private StorageInstruction $storageInstruction;

    #[ORM\ManyToOne(targetEntity: Cellar::class, fetch: 'EXTRA_LAZY', inversedBy: 'bottles'), Assert\NotNull(), Assert\NotBlank(), Groups('read.bottle')]
    #[ORM\JoinColumn(nullable: false)]
    private Cellar $cellar;

    public function __construct()
    {
        $this->isLiked = false;
        $this->familyCode = null;
    }

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

    public function getFamilyCode(): ?string
    {
        return $this->familyCode;
    }

    public function setFamilyCode(string $familyCode): self
    {
        $this->familyCode = $familyCode;

        return $this;
    }

    public function getPurchasePrice(): ?float
    {
        return $this->purchasePrice;
    }

    public function setPurchasePrice(?float $purchasePrice): self
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPurchaseAt(): ?\DateTimeImmutable
    {
        return $this->purchaseAt;
    }

    public function setPurchaseAt(?\DateTimeImmutable $purchaseAt): self
    {
        $this->purchaseAt = $purchaseAt;

        return $this;
    }

    public function getEmptyAt(): ?\DateTimeImmutable
    {
        return $this->emptyAt;
    }

    public function setEmptyAt(?\DateTimeImmutable $emptyAt): self
    {
        $this->emptyAt = $emptyAt;

        return $this;
    }

    public function getPeakAt(): ?\DateTimeImmutable
    {
        return $this->peakAt;
    }

    public function setPeakAt(?\DateTimeImmutable $peakAt): self
    {
        $this->peakAt = $peakAt;

        return $this;
    }

    public function getAlertAt(): ?\DateTimeImmutable
    {
        return $this->alertAt;
    }

    public function setAlertAt(?\DateTimeImmutable $alertAt): self
    {
        $this->alertAt = $alertAt;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function isIsLiked(): ?bool
    {
        return $this->isLiked;
    }

    public function setIsLiked(bool $isLiked): self
    {
        $this->isLiked = $isLiked;

        return $this;
    }
}