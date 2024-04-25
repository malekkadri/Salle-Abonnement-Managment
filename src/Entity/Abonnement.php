<?php

namespace App\Entity;

use App\Repository\AbonnementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbonnementRepository::class)]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $duree_abonnement;

    #[ORM\Column(type: 'string', length: 255)]
    private $prix_abonnement;

    #[ORM\Column(type: 'date')]
    private $date_deb_abonnement;

    #[ORM\Column(type: 'date')]
    private $date_fin_abonnement;

    #[ORM\ManyToOne(targetEntity: Salle::class, inversedBy: 'abonnements')]
    private $salle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDureeAbonnement(): ?string
    {
        return $this->duree_abonnement;
    }

    public function setDureeAbonnement(string $duree_abonnement): self
    {
        $this->duree_abonnement = $duree_abonnement;

        return $this;
    }

    public function getPrixAbonnement(): ?string
    {
        return $this->prix_abonnement;
    }

    public function setPrixAbonnement(string $prix_abonnement): self
    {
        $this->prix_abonnement = $prix_abonnement;

        return $this;
    }

    public function getDateDebAbonnement(): ?\DateTimeInterface
    {
        return $this->date_deb_abonnement;
    }

    public function setDateDebAbonnement(\DateTimeInterface $date_deb_abonnement): self
    {
        $this->date_deb_abonnement = $date_deb_abonnement;

        return $this;
    }

    public function getDateFinAbonnement(): ?\DateTimeInterface
    {
        return $this->date_fin_abonnement;
    }

    public function setDateFinAbonnement(\DateTimeInterface $date_fin_abonnement): self
    {
        $this->date_fin_abonnement = $date_fin_abonnement;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }
}
