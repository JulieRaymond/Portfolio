<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    // Injection du service de hachage de mot de passe via le constructeur
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    // Chargement des données de test pour les utilisateurs
    public function load(ObjectManager $manager): void
    {
        // Création d'un utilisateur administrateur
        $user = new User();
        $user->setEmail('admin@mail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'motdepasse'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        // Sauvegarde de l'utilisateur dans la base de données
        $manager->flush();
    }
}
