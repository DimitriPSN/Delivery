# Delivery

Projet tutoré dans le cadre de la licence Pro Développeur Web et Mobile pour le Commerce Electronique.

### Objectifs

Le but de ce projet est de pouvoir tracer la livraison d’un colis que l’utilisateur aurait acheté sur un site e-commerce. 
Afin de pouvoir intégrer cette fonctionnalité à un site e-commerce un micro-service doit être développé. 
Son API en PHP permettra d’ajouter un point de localisation du colis pour une date et heure donnée. 
Cette API permettra également de récupérer toutes les positions connues pour un produit à travers son numéro de colis. 
En plus du micro-service et du client PHP, une petite application avec deux pages est développée : 
 - Page d’accueil : un formulaire invitant l’utilisateur à entrer son numéro de colis. Une fois le formulaire validé on lui affiche les différentes positions de son colis ainsi qu’une Map Google avec le dernier point connu
 - Page “/new” : un formulaire qui permettra d’ajouter un point de localisation

### Livrables 

 1. *delivery-api:* composant PHP
 2. *delivery-common:* composant commun entre le client et l’api
 3. *delivery-client:* client php
 4. *delivery-app:* application utilisant le client PHP afin de gérer/afficher les positions

### Installation

Avoir un dossier *delivery* contenant les quatre livrables.

Lancer la commande suivante sur chaque dossier:
```
$ composer install
```

Définir vos identifiants de connexion en créant le fichier *.env.local* à la racine du dossier *delivery-api* sous ce format: 
```
DATABASE_URL=mysql://root:password@127.0.0.1:3306/delivery
```

Installer la base de données avec les commandes suivantes:
```
$  php bin/console doctrine:database:create
```
```
$ php bin/console doctrine:migrations:migrate
```

Lancer la commande suivante sur le dossier *delivery-app* puis sur *delivery-api*:
```
$ php bin/console server:run
```

### Lancement

L'application devrait être accessible à l'adresse http://127.0.0.1:8000/ et l'API à cette adresse http://127.0.0.1:8001/

### Capture d'écran

![Alt text](https://github.com/DimitriPSN/Delivery/blob/master/screenshot/home.png)
