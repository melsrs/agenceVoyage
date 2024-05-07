<?php

namespace App\Entity;

use App\Repository\FormReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FormReservationRepository::class)]
class FormReservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner le nombre de voyageur.')]
    #[Groups(['api_reservations_index', 'api_reservation_new'])]
    private ?int $nombreVoyageur = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre message.')]
    #[Groups(['api_reservations_index', 'api_reservation_new'])]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'formReservation')]
    #[Assert\NotBlank(message: 'Veuillez renseigner le voyage.')]
    #[Groups(['api_reservations_index', 'api_reservation_new'])]
    private ?Voyage $voyage = null;

    #[ORM\ManyToOne(inversedBy: 'formReservation')]
    #[Groups(['api_reservations_index'])]
    private ?Statut $statut = null;

    #[ORM\ManyToOne(inversedBy: 'formReservation')]
    #[Groups(['api_reservations_index'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreVoyageur(): ?int
    {
        return $this->nombreVoyageur;
    }

    public function setNombreVoyageur(int $nombreVoyageur): static
    {
        $this->nombreVoyageur = $nombreVoyageur;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getVoyage(): ?Voyage
    {
        return $this->voyage;
    }

    public function setVoyage(?Voyage $voyage): static
    {
        $this->voyage = $voyage;

        return $this;
    }


    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): static
    {
        $this->statut = $statut;

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
