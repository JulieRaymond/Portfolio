<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Technologies
        $htmlCss = new Technology();
        $htmlCss->setName('HTML&CSS');
        $manager->persist($htmlCss);

        $php = new Technology();
        $php->setName('PHP');
        $manager->persist($php);

        $javascript = new Technology();
        $javascript->setName('Javascript');
        $manager->persist($javascript);

        // Sauvegarde des technologies dans la base de données
        $manager->flush();

        // Attribution des technologies aux projets en fonction de leur ID
        for ($i = 1; $i <= 9; $i++) {
            $project = $manager->getRepository(Project::class)->find($i);

            if ($i <= 3) {
                $project->addTechnology($htmlCss);
            } elseif ($i <= 6) {
                $project->addTechnology($php);
            } else {
                $project->addTechnology($javascript);
            }

            // Sauvegarde des changements dans la base de données
            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [
            ProjectFixtures::class,
        ];
    }
}