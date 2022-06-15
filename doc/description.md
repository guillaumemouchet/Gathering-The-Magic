# Table des matière

[[_TOC_]]

## Gathering the Magic

## Explication

Le but de ce projet est de pouvoir référencer les cartes physiques du jeu Magic : the Gathering dans une application.
L'utilisateur pourra faire des classeurs de collections et savoir facilement quelle carte il possède. Il pourra ensuite regarder chaque extension pour savoir lesquelles il lui manque. Il aura la possibilité de créer des decks et pourra voir si une carte est utilisée ou si elle attend dans un classeur.
Pour avoir accès à toutes les informations des cartes et pour avoir les noms exacts une API sera utilisée, plusieurs ids sont disponibles, mais nous utiliserons le multiverse Id(https://scryfall.com/docs/api), conformément aux règles de l'Entreprise Wizard of the Coast possédant Magic : The Gathering il est possible d'utiliser les API pour faire du contenu de Fan à but non lucratif. (https://company.wizards.com/en/legal/fancontentpolicy)

L'objectif est de créer ce système de gestion de collection où les utilisateurs pourront:
* S'inscrire
* Ajouter des cartes à leur collection
* Voir le contenu de leur collection
* Rechercher des cartes selon un critère
* Faire différentes collections (par exemple avec un nom de classeur pour savoir où sont les cartes)
* Visualiser chaque extension pour savoir quelle carte il nous manque
* Faire des decks de différents formats 

## Maj pour le rendu final

La majorité des objectifs fixés après le rendu intermédiaire, il reste néanmoins encore des fonctionnalités à implémenter par la suite.

### Deck

Les decks sont un moyen de trier les cartes sous forme de liste, elle permettrait par exemple à un utilisateur de créer un deck selon ses envies puis après un bouton de vérification que l'application s'occupe de vérifier qu'elle carte l'utilisateur possède dans sa collection et qu'elle carte il faudrait ajouter comme wishlist.

Il y aurait donc la possibilité de créer des decks avec des noms, puis d'y ajouter des cartes selon celle existante dans la base de données.

### Utilisateur

Faire en sorte de créer de nouveaux utilisateurs directement dans l'application et de ne pas devoir passer par la base de données pour ajouter de nouvelles personnes.

### Cartes

Quelques ajouts sur les cartes pourraient être fait, mais un peu complexe, au lieu d'avoir un dos de cartes les utilisateurs pourraient ajouter avec leur nouvelle carte un fichier d'une image de la carte afin que les autres utilisateurs puissent la visualiser.

Une fonctionnalité afin de changer dans la collection les cartes entre owned et wishlist, pour éviter à l'utilisateur de supprimer une carte pour la rajouter s’il vient d'en acheter des copies.

### Technologie et logiciel retenus

La découverte de Boostrap (https://getbootstrap.com) à permis une grande facilité de mise en page avec leur canevas déjà existant et leur class prédéterminée, l'application n'est pas 100% avec du Boostrap, mais fait un mélange avec une peu de CSS.

### Détail technique d’AJAX

AJAX est l'acronyme pour Ascynchronous JavaScript + XML qui défini une approche de programmation liant un ensemble de technologie dont HTML, CSS, JavaScript, DOM, XML, mais principalement l'objet XMLHttpRequest. Cette technologie permet de mettre à jour l'interface utilisateur rapide dans avoir à recharger la page entièrement.
La mise en place de notre ajax permet de mettre à jour de manière asynchrone un affichage annonçant aux utilisateurs qu'une ou plusieurs nouvelles cartes ont été ajoutées à la base de données, une fois que l'utilisateur à visionné les cartes elles ne seront plus affichées comme récemment ajoutée.

EXPLICATION AJAX DE CE QU'ON A FAIT NOUS??

## Maj après le rendu intermédiaire (27.04.22)

Nous pensons qu'intégrer l'API est trop ambitieux. Nous allons réorienter le projet avec de nouveaux objectifs:
* L'utilisateur peut ajouter ses propres cartes à la base de données
* L'utilisateur reçoit une notification si une nouvelle carte est ajoutée à la base de données (système asynchrone)

## Nouveaux objectifs priorisés

| numéro | description |
|--|--|
| 1 | Retravailler la BDD pour pour transformer les test_cards en, cards|
| 2 | Ajout de nouvelles cartes par l'utilisateur  |
| 3 | Retravailler la recherche avancée |
| 4 | Notifications lors d'ajout d'une nouvelle carte à la BDD La mise en place de notre ajax permet de mettre à jour de manière asynchrone un affichage annonçant aux utilisateurs qu'une ou plusieurs nouvelles cartes ont été ajoutées à la base de données, une fois que l'utilisateur à visionné les cartes elles ne seront plus affichées comme récemment ajoutée.

## Anciens objectifs généraux priorisés

| numéro | description |
|--|--|
| 1 | Visualiser un Classeur rempli manuellement|
| 2 | Effectuer des opérations CRUD à une carte dans la collection  |
| 3 | Integration de l'API (Visualisation des cartes -> recherche avancée) |
| 4 | Visualiser chaque extension |
| 5 | Remplir les extensions en fonction de la Collection |
| 6 | s'inscrire |
| 7 | Création de collection diverse (Liste) |
| 8 | Création de decks |

NB: Si l'intégration de l'API est trop fastidieuse, il sera toujours possible de travailler avec des données en dur. 

(numéro plus haut = plus basse priorité) |


