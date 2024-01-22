<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProjectRepository $projectRepository): Response
    {
        // Récupérez vos projets depuis la base de données
        $projects = $projectRepository->findAll();

        // Passez les projets à la vue Twig
        return $this->render('home/index.html.twig', [
            'projects' => $projects,
        ]);
    }
}
