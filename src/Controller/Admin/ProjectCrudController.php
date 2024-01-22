<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function createEntity(string $entityFqcn): Project
    {
        $project = new Project();
        $project->setAuthor($this->getUser());

        return $project;
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // Aucune action supplémentaire nécessaire lors de la mise à jour
        parent::updateEntity($entityManager, $entityInstance);
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // Aucune action supplémentaire nécessaire avant la persistance
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // Aucune action supplémentaire nécessaire avant la suppression
        parent::deleteEntity($entityManager, $entityInstance);
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('description'),
            TextField::new('duration'),
            TextField::new('client'),
            TextField::new('author'),
            TextField::new('intro'),
        ];
    }
}
