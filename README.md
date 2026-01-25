# E-Shop

## Introduction
E-Shop est un site de commerce en ligne qui vend spécifiquement des produits liés à la technologie et fournit à la fois un front office et un back office pour la gestion.
Il a été développé à l'aide de l'architecture MVC, de la programmation orientée objet (OOP) et du pilote PDO pour se connecter à la base de données.

## UML

### Diagram de class

<img width="881" height="965" alt="Screenshot From 2026-01-25 20-56-40" src="https://github.com/user-attachments/assets/14a7374b-5092-42de-9696-d808b5d32aa0" />

### Diagram de cas d'utilisation

<img width="501" height="835" alt="Screenshot From 2026-01-25 20-57-20" src="https://github.com/user-attachments/assets/1fd0a583-8da5-4b3b-9350-594deea87e9f" />

## Tech stack
 - HTML5
 - BootStrap
 - Java-Script
 - PHP 8, OOP, MVC, with Composer
 - MySQL
 - Docker

## Guide
Le projet utilise **MVC**, donc des **modèles**, des **vues**, des **contrôleurs**.
Le composant principal, **le routeur**, se trouve dans le dossier core, avec d'autres fichiers tels que **controller**, 
qui est le **contrôleur** principal contenant des méthodes permettant de raccourcir les méthodes longues existantes.
Le dossier **controller** contient les fichiers où se trouve la logique, 
l'authentification, les actions d'administration, etc.
Le dossier **view** contient :
**les vues**, la section principale de la page, ainsi que le dossier **layout** qui contient 2 fichiers, 
main et admin.php, 2 mises en page principales qui sont alternées en fonction du rôle de l'utilisateur actuel.
tandis que le dossier **model** contient les classes, les produits, les commandes, les utilisateurs, etc... 
et où s'effectue la connexion à la base de données.

