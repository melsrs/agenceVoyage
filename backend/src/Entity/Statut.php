<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: StatutRepository::class)]
#[UniqueEntity(fields: 'nom', message:'Ce statut existe déjà.')]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['api_reservations_index'])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    /**
     * @var Collection<int, formReservation>
     */
    #[ORM\OneToMany(targetEntity: formReservation::class, mappedBy: 'statut')]
    private Collection $formReservation;

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
            $formReservation->setStatut($this);
        }

        return $this;
    }

    public function removeFormReservation(formReservation $formReservation): static
    {
        if ($this->formReservation->removeElement($formReservation)) {
            // set the owning side to null (unless already changed)
            if ($formReservation->getStatut() === $this) {
                $formReservation->setStatut(null);
            }
        }

        return $this;
    }
}
