<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, MailerInterface $mailer, ProjectRepository $projectRepository, TechnologyRepository $technologyRepository): Response
    {
        // Récupération de tous les projets depuis la base de données
        $projects = $projectRepository->findAll();

        // Récupération de toutes les technologies depuis la base de données
        $allTechnologies = $technologyRepository->findAll();

        // Création du formulaire de contact
        $form = $this->createForm(ContactType::class);

        // Gestion de la soumission du formulaire
        $form->handleRequest($request);

        // Vérification si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            // Création d'un objet Email avec les données du formulaire
            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('your@mail.com')
                ->subject('You got mail')
                ->text('Sender: ' . $contactFormData['email'] . PHP_EOL . $contactFormData['message'], 'text/plain');

            // Envoi du message via le service de messagerie
            $mailer->send($message);

            // Ajout d'un message flash pour informer l'utilisateur de la réussite de l'envoi
            $this->addFlash('success', 'Votre message a bien été envoyé, merci de votre prise de contact');

            // Redirection vers la page d'accueil après l'envoi du message
            return $this->redirectToRoute('app_home');
        }

        // Passage des projets, de toutes les technologies et du formulaire à la vue Twig
        return $this->render('home/index.html.twig', [
            'projects' => $projects,
            'allTechnologies' => $allTechnologies,
            'our_form' => $form->createView(),
        ]);
    }
}
