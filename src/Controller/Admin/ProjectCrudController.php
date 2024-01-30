<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Filesystem\Filesystem;
use Vich\UploaderBundle\VichUploaderBundle;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function createEntity(string $entityFqcn): Project
    {
        $project = new Project();

        return $project;
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // Aucune action supplémentaire nécessaire lors de la mise à jour
        parent::updateEntity($entityManager, $entityInstance);
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $imagePath = 'public/assets/uploads/portfolio/' . $entityInstance->getId() . '.jpg';
        $filesystem = new Filesystem();
        $filesystem->remove($imagePath);
        parent::deleteEntity($entityManager, $entityInstance);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(), // Ne pas afficher le champ ID dans le formulaire
            TextField::new('title'),
            TextEditorField::new('description'),
            TextField::new('duration'),
            TextField::new('client'),
            TextField::new('author'),
            TextField::new('intro'),
            ImageField::new('imagePath')
                ->setUploadDir('public/assets/uploads/portfolio/') // uploader de nouvelles images
                ->setBasePath('/assets/uploads/portfolio/') // définir l'emplacement d'origine des images
        ];
    }
}
