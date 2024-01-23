<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, MailerInterface $mailer, ProjectRepository $projectRepository): Response
    {
        // Récupérez vos projets depuis la base de données
        $projects = $projectRepository->findAll();

        // Créez le formulaire de contact
        $form = $this->createForm(ContactType::class);

        // Gérez la soumission du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('your@mail.com')
                ->subject('You got mail')
                ->text('Sender: ' . $contactFormData['email'] . PHP_EOL . $contactFormData['message'], 'text/plain');
            $mailer->send($message);

            $this->addFlash('success', 'Votre message a bien été envoyé, merci de votre prise de contact');

            // Restez sur la page d'accueil après l'envoi du formulaire
            return $this->redirectToRoute('app_home');
        }

        // Passez les projets et le formulaire à la vue Twig
        return $this->render('home/index.html.twig', [
            'projects' => $projects,
            'our_form' => $form->createView(),
        ]);
    }
}
