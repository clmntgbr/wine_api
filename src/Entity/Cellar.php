<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CellarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CellarRepository::class)]
#[ApiResource(
    order: ['id' => 'ASC'],
    collectionOperations: [
        'get',
        'post' => ['denormalization_context' => ['groups' => ['write_cellar']]],
    ],
    itemOperations: [
        'get', 
        'delete', 
        'put' => ['denormalization_context' => ['groups' => ['write_cellar']]],
    ],
    normalizationContext: [
        'skip_null_values' => false,
        'groups' => ['read_cellar'],
    ],
)]
class Cellar
{
    use TimestampableEntity;
    use BlameableEntity;

    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    #[Groups('read_cellar')]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: false)]
    #[Groups(['read_cellar', 'write_cellar'])]
    private ?string $name;

    #[ORM\Column(type: Types::INTEGER)]
    #[Groups(['read_cellar', 'write_cellar'])]
    private ?int $row;

    #[ORM\Column(type: Types::INTEGER)]
    #[Groups(['read_cellar', 'write_cellar'])]
    private ?int $clmn;

    #[ORM\Column(type: Types::BOOLEAN)]
    #[Groups(['read_cellar', 'write_cellar'])]
    private ?bool $isActive;

    #[ORM\ManyToOne(targetEntity: User::class, fetch: 'EXTRA_LAZY', inversedBy: 'cellars')]
    private User $user;

    #[ORM\OneToMany(mappedBy: 'cellar', targetEntity: Bottle::class, cascade: ['persist', 'remove'])]
    private Collection $bottles;

    public function __toString(): string
    {
        return $this->name ?? sprintf('%s, %s', $this->id, $this->user->getEmail());
    }

    public function __construct()
    {
        $this->isActive = false;
        $this->bottles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Bottle>
     */
    public function getBottles(): Collection
    {
        return $this->bottles;
    }

    #[SerializedName('bottlesInCellar'), Groups('read')]
    public function getCountBottles(): int
    {
        $bottles = $this->getBottles()->filter(function(Bottle $bottle) {
            return $bottle->getEmptyAt() === null;
        });

        return $bottles->count();
    }

    public function addBottle(Bottle $bottle): self
    {
        if (!$this->bottles->contains($bottle)) {
            $this->bottles->add($bottle);
            $bottle->setCellar($this);
        }

        return $this;
    }

    public function removeBottle(Bottle $bottle): self
    {
        if ($this->bottles->removeElement($bottle)) {
            // set the owning side to null (unless already changed)
            if ($bottle->getCellar() === $this) {
                $bottle->setCellar(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function getRow(): ?int
    {
        return $this->row;
    }

    public function setRow(int $row): self
    {
        $this->row = $row;

        return $this;
    }

    public function getClmn(): ?int
    {
        return $this->clmn;
    }

    public function setClmn(int $clmn): self
    {
        $this->clmn = $clmn;

        return $this;
    }
}