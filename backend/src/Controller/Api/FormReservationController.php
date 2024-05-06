<?php

namespace App\Controller\Api;

use App\Repository\FormReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/form/reservation', name: 'api_form_reservation_')]
class FormReservationController extends AbstractController
{
    #[Route('s', name: 'index')]
    public function index(FormReservationRepository $formReservationController): Response
    {
        $reservations = $formReservationController->findAll();

        return $this->json(data: $reservations, context: ['groups'=> 'api_reservations_index']);
    }
}