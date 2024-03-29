<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Project;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création et chargement de données fictives pour la base de données
        // Projet 1
        $project1 = new Project();
        $project1->setTitle('Trombinoscope');
        $project1->setIntro('Projet 1 - étude bac +2');
        $project1->setDescription('Description du projet 1');
        $project1->setDuration('1 mois');
        $project1->setClient('Wild Code School');
        $project1->setAuthor('Julie Raymond');
        $project1->setGithub('https://github.com/JulieRaymond/project1-trombi');

        $manager->persist($project1);

        // Projet 2
        $project2 = new Project();
        $project2->setTitle('Site de blog "BUMP"');
        $project2->setIntro('Projet 2 - étude bac+2');
        $project2->setDescription('Description du projet 2');
        $project2->setDuration('1 mois');
        $project2->setClient('Wild Code School');
        $project2->setAuthor('Julie Raymond');
        $project2->setGithub('https://github.com/JulieRaymond/projet2-blog');

        $manager->persist($project2);

        // Projet 3
        $project3 = new Project();
        $project3->setTitle('Site de série');
        $project3->setIntro('Projet 3 - étude bac+2');
        $project3->setDescription('Description du projet 3');
        $project3->setDuration('2 semaines');
        $project3->setClient('Wild Code School');
        $project3->setAuthor('Julie Raymond');
        $project3->setGithub('https://github.com/JulieRaymond/wild-series');

        $manager->persist($project3);

        // Projet 4
        $project4 = new Project();
        $project4->setTitle('Site Externatic');
        $project4->setIntro('Projet 4 - étude bac+2');
        $project4->setDescription('Description du projet 4');
        $project4->setDuration('2 mois');
        $project4->setClient('Externatic');
        $project4->setAuthor('Julie Raymond');
        $project4->setGithub('https://github.com/WildCodeSchool-2023-09/bdx-php-p3-externatic');

        $manager->persist($project4);

        // Projet 5
        $project5 = new Project();
        $project5->setTitle('Héracles game');
        $project5->setIntro('Projet 5 - étude bac+2');
        $project5->setDescription('Description du projet 5');
        $project5->setDuration('5 jours');
        $project5->setClient('Wild Code School');
        $project5->setAuthor('Julie Raymond');
        $project5->setGithub('https://github.com/JulieRaymond/workshop-php-poo-heracles-labour-4');

        $manager->persist($project5);

        // Projet 6
        $project6 = new Project();
        $project6->setTitle('Map game');
        $project6->setIntro('Projet 6 - étude bac+2');
        $project6->setDescription('Description du projet 6');
        $project6->setDuration('2 heures');
        $project6->setClient('Wild Code School');
        $project6->setAuthor('Julie Raymond');
        $project6->setGithub('https://github.com/JulieRaymond/mapGame');

        $manager->persist($project6);

        // Projet 7
        $project7 = new Project();
        $project7->setTitle('Puissance 4');
        $project7->setIntro('Projet personnel');
        $project7->setDescription('Description du projet 7');
        $project7->setDuration('2 jour');
        $project7->setClient('Projet personnel');
        $project7->setAuthor('Julie Raymond');
        $project7->setGithub('https://github.com/JulieRaymond/mon-puissance4');

        $manager->persist($project7);

        // Projet 8
        $project8 = new Project();
        $project8->setTitle('Trello like');
        $project8->setIntro('Projet personnel');
        $project8->setDescription('Description du projet 8');
        $project8->setDuration('5 heures');
        $project8->setClient('Projet personnel');
        $project8->setAuthor('Julie Raymond');
        $project8->setGithub('https://github.com/JulieRaymond/TrelloLike');

        $manager->persist($project8);

        // Projet 9
        $project9 = new Project();
        $project9->setTitle('Draw Pixel');
        $project9->setIntro('Projet personnel');
        $project9->setDescription('Description du projet 9');
        $project9->setDuration('4 heures');
        $project9->setClient('Projet personnel');
        $project9->setAuthor('Julie Raymond');
        $project9->setGithub('https://github.com/JulieRaymond/dojo-drawPixel');

        $manager->persist($project9);

        $manager->flush();

        // Attribution des images aux projets en fonction de leur ID
        foreach ($manager->getRepository(Project::class)->findAll() as $project) {
            $imagePath = $project->getId() . '.jpg';
            $project->setImagePath($imagePath);
        }

        // Sauvegarde des changements dans la base de données
        $manager->flush();
    }
}