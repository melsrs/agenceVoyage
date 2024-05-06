<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: VoyageRepository::class)]
class Voyage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['api_voyages_index'])]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    #[Groups(['api_voyages_index'])]
    private ?string $image = null;

    #[ORM\Column]
    #[Groups(['api_voyages_index'])]
    private ?int $prix = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['api_voyages_index'])]
    private ?\DateTimeInterface $datedepart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['api_voyages_index'])]
    private ?\DateTimeInterface $datearrivee = null;

    #[ORM\Column(length: 255)]
    #[Groups(['api_voyages_index'])]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    #[Groups(['api_voyages_index'])]
    private ?string $moyentransport = null;

    #[ORM\ManyToOne(inversedBy: 'voyages')]
    #[Groups(['api_voyages_index'])]
    private ?Pays $Pays = null;

    #[ORM\ManyToOne(inversedBy: 'voyages')]
    #[Groups(['api_voyages_index'])]
    private ?Categorie $Categorie = null;


    /**
     * @var Collection<int, formReservation>
     */
    #[ORM\OneToMany(targetEntity: formReservation::class, mappedBy: 'voyage')]
    private Collection $formReservation;

    #[ORM\ManyToOne(inversedBy: 'Voyage')]
    private ?User $user = null;

    public function __construct()
    {
        $this->formReservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDatedepart(): ?\DateTimeInterface
    {
        return $this->datedepart;
    }

    public function setDatedepart(\DateTimeInterface $datedepart): static
    {
        $this->datedepart = $datedepart;

        return $this;
    }

    public function getDatearrivee(): ?\DateTimeInterface
    {
        return $this->datearrivee;
    }

    public function setDatearrivee(\DateTimeInterface $datearrivee): static
    {
        $this->datearrivee = $datearrivee;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMoyentransport(): ?string
    {
        return $this->moyentransport;
    }

    public function setMoyentransport(string $moyentransport): static
    {
        $this->moyentransport = $moyentransport;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->Pays;
    }

    public function setPays(?Pays $Pays): static
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): static
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    /**
     * @return Collection<int, formReservation>
     */
    public function getFormReservation(): Collection
    {
        return $this->formReservation;
    }

    public function addFormReservation(formReservation $formReservation): static
    {
        if (!$this->formReservation->contains($formReservation)) {
            $this->formReservation->add($formReservation);
            $formReservation->setVoyage($this);
        }

        return $this;
    }

    public function removeFormReservation(formReservation $formReservation): static
    {
        if ($this->formReservation->removeElement($formReservation)) {
            // set the owning side to null (unless already changed)
            if ($formReservation->getVoyage() === $this) {
                $formReservation->setVoyage(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
