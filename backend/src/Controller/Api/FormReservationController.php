<?php

namespace App\Controller\Api;

use App\Entity\FormReservation;
use App\Repository\FormReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;


#[Route('/api/reservation', name: 'api_reservation_')]
class FormReservationController extends AbstractController
{
    #[Route('s', name: 'index')]
    public function index(FormReservationRepository $formReservationController): Response
    {
        $reservations = $formReservationController->findAll();

        return $this->json(data: $reservations, context: ['groups'=> 'api_reservations_index']);
    }

        // Route pour créer une nouvelle reservation, depuis POST en JSON.
    // Pour la tester, utilisez POSTMAN (https://www.postman.com/downloads/).
    #[Route('/new', name: "new", methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $em, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        /** 
         * * 1. Récupération des données
         * D'abord, on doit récupérer la requête :
         * c'est la même chose que $form->handleRequest($request).
         * on appelle le serializer, qui a besoin de la requête, de l'objet à instancer, du format de la requête qu'il va recevoir, et des groupes qu'il va devoir utiliser.
         */

        $reservation = $serializer->deserialize($request->getContent(), FormReservation::class, 'json', ['groups' => 'api_reservations_new']);

        /**
         * * 2. Validation des données
         * Ensuite, on valide (ou pas) la requête :
         * C'est la même chose que $form->isValid()
         * Et on stocke le résultat dans une variable $errors.
         */
        $errors = $validator->validate($reservation);

        /**
         * * 3. Retours
         * S'il y a des erreurs, on va retourner les messages,
         * avec un code 422, qui précise qu'on a pas pu construire l'entité
         * 
         * S'il n'y en a pas, on renvoie ce qu'on veut (ici, rien),
         * avec un code 201, qui précise que la ressource a été créée.
         */
        if ($errors->count()) {
            $messages = [];
            foreach ($errors as $error) {
                $messages[] = $error->getMessage();
            }

            return $this->json($messages, Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            // On pense bien à enregistrer en BDD.
            $em->persist($reservation);
            $em->flush();

            return $this->json(null, Response::HTTP_CREATED);
        }
    }
}