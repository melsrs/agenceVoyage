<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(length: 20)]
    private ?string $tel = null;

    /**
     * @var Collection<int, Voyage>
     */
    #[ORM\OneToMany(targetEntity: Voyage::class, mappedBy: 'utilisateur')]
    private Collection $Voyage;

    #[ORM\ManyToOne(inversedBy: 'Utilisateur')]
    private ?Role $role = null;

    /**
     * @var Collection<int, formReservation>
     */
    #[ORM\OneToMany(targetEntity: formReservation::class, mappedBy: 'utilisateur')]
    private Collection $formReservation;

    public function __construct()
    {
        $this->Voyage = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection<int, Voyage>
     */
    public function getVoyage(): Collection
    {
        return $this->Voyage;
    }

    public function addVoyage(Voyage $voyage): static
    {
        if (!$this->Voyage->contains($voyage)) {
            $this->Voyage->add($voyage);
            $voyage->setUtilisateur($this);
        }

        return $this;
    }

    public function removeVoyage(Voyage $voyage): static
    {
        if ($this->Voyage->removeElement($voyage)) {
            // set the owning side to null (unless already changed)
            if ($voyage->getUtilisateur() === $this) {
                $voyage->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): static
    {
        $this->role = $role;

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
            $formReservation->setUtilisateur($this);
        }

        return $this;
    }

    public function removeFormReservation(formReservation $formReservation): static
    {
        if ($this->formReservation->removeElement($formReservation)) {
            // set the owning side to null (unless already changed)
            if ($formReservation->getUtilisateur() === $this) {
                $formReservation->setUtilisateur(null);
            }
        }

        return $this;
    }
}
