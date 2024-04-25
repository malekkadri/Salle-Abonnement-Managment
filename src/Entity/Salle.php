<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_salle;

    #[ORM\Column(type: 'string', length: 255)]
    private $description_salle;

    #[ORM\Column(type: 'string', length: 255)]
    private $region_salle;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse_salle;

    #[ORM\OneToMany(mappedBy: 'salle', targetEntity: Abonnement::class)]
    private $abonnements;

    public function __construct()
    {
        $this->abonnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSalle(): ?string
    {
        return $this->nom_salle;
    }

    public function setNomSalle(string $nom_salle): self
    {
        $this->nom_salle = $nom_salle;

        return $this;
    }

    public function getDescriptionSalle(): ?string
    {
        return $this->description_salle;
    }

    public function setDescriptionSalle(string $description_salle): self
    {
        $this->description_salle = $description_salle;

        return $this;
    }

    public function getRegionSalle(): ?string
    {
        return $this->region_salle;
    }

    public function setRegionSalle(string $region_salle): self
    {
        $this->region_salle = $region_salle;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAdresseSalle(): ?string
    {
        return $this->adresse_salle;
    }

    public function setAdresseSalle(string $adresse_salle): self
    {
        $this->adresse_salle = $adresse_salle;

        return $this;
    }

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements[] = $abonnement;
            $abonnement->setSalle($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getSalle() === $this) {
                $abonnement->setSalle(null);
            }
        }

        return $this;
    }
}
