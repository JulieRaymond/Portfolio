# Projet Symfony de Gestion de Projets

Un projet Symfony pour la gestion de projets sur mon Portfolio.

## Table des matières

- [Présentation](#présentation)
- [Technologies utilisées](#technologies-utilisées)
- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Contribution](#contribution)

## Présentation

Le projet Symfony que j'ai développé est une application robuste de gestion de projets, conçue pour offrir aux visiteurs
une expérience complète à travers un Portfolio détaillé, reflétant en temps réel mes avancées dans le domaine du
développement web.

L'architecture de l'application se décompose en plusieurs sections pensées pour faciliter la navigation. Une première
section présente un aperçu de ma personnalité et de mon identité professionnelle. Ensuite, une section dédiée à mes
compétences technologiques offre un panorama clair de l'éventail des outils que je maîtrise. La troisième section expose
en détail mon parcours professionnel, mettant en lumière les différentes étapes qui ont forgé mon expertise.

La partie centrale du projet réside dans la présentation détaillée de chacun de mes projets. Chaque projet est associé à
une ou plusieurs technologies, et une fonctionnalité de filtrage permet aux visiteurs de cibler rapidement les domaines
qui les intéressent particulièrement. Chaque projet est accompagné d'une description exhaustive, des défis relevés aux
solutions mises en place.

L'aspect administratif du projet est géré avec l'outil Easy Admin. Cela offre à un administrateur la possibilité de
manipuler les projets et les technologies associées avec une grande facilité. Les actions CRUD (Create, Read, Update,
Delete) sont disponibles pour les entités Project et Technology, permettant ainsi une gestion fine et réactive de
l'ensemble du contenu. Cette approche offre une flexibilité maximale dans la mise à jour constante du Portfolio et
garantit une expérience utilisateur à jour et pertinente.

## Technologies utilisées

- Utilisation de Symfony 7 comme framework principal.
- PHP version 8.2 pour le développement.
- Intégration d'AssetMapper pour la gestion des assets.
- Base de données MySQL pour le stockage des données.
- Intégration du bundle Symfony/security-bundle pour les fonctionnalités de sécurité.
- Utilisation du bundle Symfony/twig-bundle pour le moteur de templates Twig.
- Intégration de Vich/uploader-bundle pour la gestion des uploads de fichiers.
- Utilisation du bundle Symfony/mailer pour la gestion des emails.
- Configuration de Mailtrap comme service de test pour les emails.
- Intégration de Bootstrap pour le design et la mise en page.
- Utilisation de Doctrine/doctrine-bundle pour la gestion de la base de données.
- Intégration d'Easycorp/easyadmin-bundle pour une administration simplifiée du back-office.
- Utilisation de AOS - Animate On Scroll - pour les effets visuels lors du scroll.

## Installation

1. Cloner le dépôt :

```bash
git clone https://github.com/JulieRaymond/Portfolio.git
```

2. Installer les dépendances :

```bash
composer install
```

3. Configurer la base de données :

```bash
Symfony console doctrine:database:drop --force
Symfony console doctrine:database:create
Symfony console make:migration
Symfony console doctrine:migrations:migrate
Symfony console doctrine:fixtures:load
```

4. Lancer le serveur de développement :

```bash
symfony server:start
```

## Configuration

Le fichier `.env.local` doit être configuré avec les paramètres de base de données et d'autres configurations
spécifiques à votre environnement.

## Utilisation

Une fois le projet installé et configuré, vous pouvez accéder à l'application via le navigateur à l'
adresse [http://localhost:8000](http://localhost:8000).
Il s'agit d'une application single page, à l'exception de la page de connexion admin, qui permet d'obtenir l'accès à
l'espace "Dashboard". Sur cet espace, l'admin peut créer, éditer, supprimer des projets et les technologies qui lui sont
associées.

## Contribution

Vous pouvez contribuer à ce projet en suivant les étapes suivantes :

1. Forker le projet
2. Créer une branche (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Commiter les changements (`git commit -am 'Ajouter une nouvelle fonctionnalité'`)
4. Pousser la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrir une Pull Request

## Contact

Vous pouvez me contacter, en suivant les liens, via :
- [LinkedIn](https://www.linkedin.com/in/julie-raymond-5b391a162/)
- [GitHub](https://github.com/JulieRaymond)
