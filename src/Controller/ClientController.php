<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/clients')]
final class ClientController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    /**
     * Liste des clients.
     */
    #[Route('/', name: 'app_clients')]
    public function index(): Response
    {
        $clients = $this->entityManager->getRepository(Client::class)->findAll();
        if (!$clients) {
            throw $this->createNotFoundException('No clients found!');
        }

        return $this->render('client/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    /**
     * Détail d’un client.
     */
    #[Route('/{id}', name: 'app_clients_show', requirements: ['id' => '\d+'])]
    public function show(Client $client): Response
    {
        return $this->render('client/details.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * Ajout / Modification d’un client.
     */
    #[Route('/create', name: 'app_clients_create')]
    #[Route('/{id}/edit', name: 'app_clients_edit', requirements: ['id' => '\d+'])]
    public function createOrEdit(?int $id, Request $request): Response
    {
        if (null === $id) {
            // If no ID is provided, create a new client
            $client = new Client();
        } else {
            // If an ID is provided, fetch the existing client
            $client = $this->entityManager->getRepository(Client::class)->find($id);
            if (!$client) {
                throw $this->createNotFoundException('Client not found!');
            }
        }

        // Create the form for the client
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        // If the form is submitted and valid, save the client
        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();

            // Save the client in the database
            $this->entityManager->persist($client);
            $this->entityManager->flush();

            // Add a flash message to notify the user
            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );

            // Redirect to the client list or the details page
            return $this->redirectToRoute('app_clients');
        }

        // Render the form view
        return $this->render('client/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Suppression d’un client.
     */
    #[Route('/{id}/delete', name: 'app_clients_delete', requirements: ['id' => '\d+'])]
    public function delete(Client $client): Response
    {
        // Remove the client from the database
        $this->entityManager->remove($client);
        $this->entityManager->flush();

        $this->addFlash(
            'notice',
            'Client deleted successfully!'
        );

        return $this->redirectToRoute('app_clients');
    }
}
