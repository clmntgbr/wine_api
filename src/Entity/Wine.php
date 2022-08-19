<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: WineRepository::class)]
#[ApiResource]
class Wine
{
    use TimestampableEntity;
    use BlameableEntity;

    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: false), Assert\NotNull(), Assert\NotBlank()]
    private ?string $name;

    #[ORM\Column(type: Types::STRING, nullable: false)]
    private ?string $formatName;

    #[ORM\ManyToOne(targetEntity: Appellation::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Appellation $appellation;

    #[ORM\ManyToOne(targetEntity: Domain::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Domain $domain;

    #[ORM\ManyToOne(targetEntity: Region::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Region $region;

    #[ORM\ManyToOne(targetEntity: Country::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Country $country;

    #[ORM\ManyToOne(targetEntity: Color::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Color $color;

    #[ORM\ManyToOne(targetEntity: WineDetail::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private WineDetail $wineDetail;

    #[ORM\ManyToOne(targetEntity: Abv::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Abv $abv;

    #[ORM\ManyToOne(targetEntity: Vintage::class, fetch: 'EXTRA_LAZY'), Assert\NotNull(), Assert\NotBlank()]
    #[ORM\JoinColumn(nullable: false)]
    private Vintage $vintage;

    #[ORM\ManyToOne(targetEntity: Status::class, fetch: 'EXTRA_LAZY')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Status $status;

    #[ORM\ManyToMany(targetEntity: Arrangement::class, cascade: ['persist'])]
    private Collection $arrangements;

    #[ORM\ManyToMany(targetEntity: Award::class, cascade: ['persist'])]
    private Collection $awards;

    #[ORM\ManyToMany(targetEntity: Style::class, cascade: ['persist'])]
    private Collection $styles;

    #[ORM\ManyToMany(targetEntity: GrapeVariety::class, cascade: ['persist'])]
    private Collection $grapeVarieties;

    #[ORM\ManyToMany(targetEntity: Bio::class, cascade: ['persist'])]
    private Collection $bios;

    public function __construct()
    {
        $this->status = null;
        $this->arrangements = new ArrayCollection();
        $this->awards = new ArrayCollection();
        $this->styles = new ArrayCollection();
        $this->grapeVarieties = new ArrayCollection();
        $this->bios = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->formatName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getAppellation(): ?Appellation
    {
        return $this->appellation;
    }

    public function setAppellation(?Appellation $appellation): self
    {
        $this->appellation = $appellation;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getDomain(): ?Domain
    {
        return $this->domain;
    }

    public function setDomain(?Domain $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getWineDetail(): ?WineDetail
    {
        return $this->wineDetail;
    }

    public function setWineDetail(?WineDetail $wineDetail): self
    {
        $this->wineDetail = $wineDetail;

        return $this;
    }

    public function getAbv(): ?Abv
    {
        return $this->abv;
    }

    public function setAbv(?Abv $abv): self
    {
        $this->abv = $abv;

        return $this;
    }

    public function getVintage(): ?Vintage
    {
        return $this->vintage;
    }

    public function setVintage(?Vintage $vintage): self
    {
        $this->vintage = $vintage;

        return $this;
    }

    /**
     * @return Collection<int, Arrangement>
     */
    public function getArrangements(): Collection
    {
        return $this->arrangements;
    }

    public function addArrangement(Arrangement $arrangement): self
    {
        if (!$this->arrangements->contains($arrangement)) {
            $this->arrangements->add($arrangement);
        }

        return $this;
    }

    public function removeArrangement(Arrangement $arrangement): self
    {
        $this->arrangements->removeElement($arrangement);

        return $this;
    }

    /**
     * @return Collection<int, Award>
     */
    public function getAwards(): Collection
    {
        return $this->awards;
    }

    public function addAward(Award $award): self
    {
        if (!$this->awards->contains($award)) {
            $this->awards->add($award);
        }

        return $this;
    }

    public function removeAward(Award $award): self
    {
        $this->awards->removeElement($award);

        return $this;
    }

    /**
     * @return Collection<int, Style>
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(Style $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles->add($style);
        }

        return $this;
    }

    public function removeStyle(Style $style): self
    {
        $this->styles->removeElement($style);

        return $this;
    }

    /**
     * @return Collection<int, GrapeVariety>
     */
    public function getGrapeVarieties(): Collection
    {
        return $this->grapeVarieties;
    }

    public function addGrapeVariety(GrapeVariety $grapeVariety): self
    {
        if (!$this->grapeVarieties->contains($grapeVariety)) {
            $this->grapeVarieties->add($grapeVariety);
        }

        return $this;
    }

    public function removeGrapeVariety(GrapeVariety $grapeVariety): self
    {
        $this->grapeVarieties->removeElement($grapeVariety);

        return $this;
    }

    /**
     * @return Collection<int, Bio>
     */
    public function getBios(): Collection
    {
        return $this->bios;
    }

    public function addBio(Bio $bio): self
    {
        if (!$this->bios->contains($bio)) {
            $this->bios->add($bio);
        }

        return $this;
    }

    public function removeBio(Bio $bio): self
    {
        $this->bios->removeElement($bio);

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }
}
