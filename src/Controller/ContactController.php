<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): \Symfony\Component\HttpFoundation\RedirectResponse|Response
    {
        // Création d'un formulaire de type ContactType
        $form = $this->createForm(ContactType::class);

        // Traitement de la requête HTTP
        $form->handleRequest($request);

        // Vérification si le formulaire a été soumis et est valide
        if($form->isSubmitted() && $form->isValid()) {

            // Récupération des données du formulaire
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

        // Affichage du formulaire sur la page 'contact/index.html.twig' en passant le formulaire en tant que variable
        return $this->render('contact/index.html.twig', [
            'our_form' => $form->createView()
        ]);
    }

}