# Table des matière

[[_TOC_]]

## Gathering the Magic

## Explication

Le but de ce projet est de pouvoir référencer les cartes physiques du jeu Magic : the Gathering dans une application.
L'utilisateur pourra faire des classeurs de collections et savoir facilement quelle carte il possède. Il pourra ensuite regarder chaque extension pour savoir lesquelles il lui manque. Il aura la possibilité de créer des decks et pourra voir si une carte est utilisée ou si elle attend dans un classeur.
Pour avoir accès à toutes les informations des cartes et pour avoir les noms exacts une API sera utilisée, plusieurs ids sont disponible mais nous utiliserons le multiverse Id(https://scryfall.com/docs/api), Conformément aux règles de l'Entreprise Wizard of the Coast possédant Magic : The Gathering il est possible d'utiliser les API pour faire du contenu de Fan à but non lucratif. (https://company.wizards.com/en/legal/fancontentpolicy)

L'objectif est de créer ce système de gestion de collection où les utilisateur pourront:
* S'inscrire
* Ajouter des cartes à leur collection
* Voir le contenu de leur collection
* Rechercher des cartes selon un critère
* Faire différentes collection (Par exemple avec un nom de classeur pour savoir ou sont les cartes)
* Visualiser chaque extension pour savoir quelle carte il nous manque
* Faire des decks de différents formats 

## MaJ après le rendu intermédiaire (27.04.22)

Nous pensons qu'intégrer l'API est trop ambitieux. Nous allons réorienter le projet avec de nouveaux objectifs:
* L'utilisateur peut ajouter ses propres cartes à la base de données
* L'utilisateur reçoit une notification si une nouvelle carte est ajoutée à la base de données (système asynchrone)

## Nouveaux objectifs priorisés

| numéro | description |
|---|---|
| 1 | Retravailler la BDD pour pour transformer les test_cards en cards|
| 2 | Ajout de nouvelles cartes par l'utilisateur  |
| 3 | Retravailler la recherche avancée |
| 4 | Notifications lors d'ajout d'une nouvelle carte à la BDD |
| 5 | Mise en page CSS |
| 6 | Intégration des utilisateurs |
| 7 | Gestion de decks |

## Anciens objectifs généraux priorisés

| numéro | description |
|---|---|
| 1 | Visualiser un Classeur rempli manuellement|
| 2 | Effectuer des opérations CRUD à une carte dans la collection  |
| 3 | Integration de l'API (Visualisation des cartes -> recherche avancée) |
| 4 | Visualiser chaque extension |
| 5 | Remplir les extensions en fonction de la Collection |
| 6 | s'inscrire |
| 7 | Création de collection diverse (Liste) |
| 8 | Création de decks |

NB: Si l'intégration de l'API est trop fastidieuse, il sera toujours possible de travailler avec des données en dur. 

(numéro plus haut = plus basse priorité)
