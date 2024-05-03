<?php

namespace App\Controller;

use App\Entity\FormReservation;
use App\Form\FormReservationType;
use App\Repository\FormReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
#[Route('/form/reservation', name: "app_form_reservation_")]
class FormReservationController extends AbstractController
{
    #[Route('s', name: 'index')]
    public function index(FormReservationRepository $formReservationRepository): Response
    {
        return $this->render('form_reservation/index.html.twig', [
            'form_reservations' => $formReservationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formReservation = new FormReservation();
        $form = $this->createForm(FormReservationType::class, $formReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formReservation);
            $entityManager->flush();

            return $this->redirectToRoute('app_form_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('form_reservation/new.html.twig', [
            'form_reservation' => $formReservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(FormReservation $formReservation): Response
    {
        return $this->render('form_reservation/show.html.twig', [
            'form_reservation' => $formReservation,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FormReservation $formReservation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormReservationType::class, $formReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'La reservation a été mise à jour');

            return $this->redirectToRoute('app_form_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('form_reservation/edit.html.twig', [
            'form_reservation' => $formReservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(FormReservation $formReservation, EntityManagerInterface $entityManager): Response
    {

            $entityManager->remove($formReservation);
            $entityManager->flush();

            $this->addFlash('success', 'La reservation a bien été supprimée');

        return $this->redirectToRoute('app_form_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
}
