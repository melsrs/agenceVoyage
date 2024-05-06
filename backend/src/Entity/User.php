<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['api_reservations_index'])]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column(nullable: true)]
    private ?string $password = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $telephone = null;

    /**
     * @var Collection<int, Voyage>
     */
    #[ORM\OneToMany(targetEntity: Voyage::class, mappedBy: 'user')]
    private Collection $Voyage;

    /**
     * @var Collection<int, formReservation>
     */
    #[ORM\OneToMany(targetEntity: formReservation::class, mappedBy: 'user')]
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): static
    {
        $this->telephone = $telephone;

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
            $voyage->setUser($this);
        }

        return $this;
    }

    public function removeVoyage(Voyage $voyage): static
    {
        if ($this->Voyage->removeElement($voyage)) {
            // set the owning side to null (unless already changed)
            if ($voyage->getUser() === $this) {
                $voyage->setUser(null);
            }
        }

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
            $formReservation->setUser($this);
        }

        return $this;
    }

    public function removeFormReservation(formReservation $formReservation): static
    {
        if ($this->formReservation->removeElement($formReservation)) {
            // set the owning side to null (unless already changed)
            if ($formReservation->getUser() === $this) {
                $formReservation->setUser(null);
            }
        }

        return $this;
    }
}
