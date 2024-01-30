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

Ce projet Symfony est une application de gestion de projets. Il permet à un admin de créer, mettre à jour, et supprimer des projets avec des informations détaillées grâce à Easy Admin, et aux visiteurs de voir un Portfolio complet et à jour de mes avancées en développement web.

## Technologies utilisées

- Symfony 7
- AssetMapper
- MySql
- Security bundle
- Mailer
- Mailtrap
- Bootstrap
- Doctrine ORM
- EasyAdminBundle

## Installation

1. Cloner le dépôt :

```bash
git clone https://github.com/votre-utilisateur/votre-projet.git
```

2. Installer les dépendances :

```bash
composer install
```

3. Configurer la base de données :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

4. Lancer le serveur de développement :

```bash
symfony serve
```

## Configuration

Le fichier `.env.local` doit être configuré avec les paramètres de base de données et d'autres configurations spécifiques à votre environnement.

## Utilisation

Une fois le projet installé et configuré, vous pouvez accéder à l'application via le navigateur à l'adresse [http://localhost:8000](http://localhost:8000).

## Contribution

Vous pouvez contribuer à ce projet en suivant les étapes suivantes :

1. Forker le projet
2. Créer une branche (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Commiter les changements (`git commit -am 'Ajouter une nouvelle fonctionnalité'`)
4. Pousser la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrir une Pull Request
