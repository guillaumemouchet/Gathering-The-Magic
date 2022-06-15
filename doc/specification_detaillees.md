# Spécifications détaillées

### Sécurité
Le visiteur pourra avoir accès à la page d'acceuil, la page de connexion et à la recherche de carte, il ne pourra pas sélectionner de carte pour l'ajouter à sa collection.
## Connexion
Afin de pouvoir accéder aux fonctionnalités de l'application, l'utilisateur doit se connecter. En effet, le site recense des collections et des decks personnels. Le mot-de-passe est stocké hashé dans la base de donnée. 

Pas implémenter : Possibilité d'implémenter une visualisation des decks sans connexion, afin de les partager par exemple. Dans un premier temps les utilisateurs sont créés en dur dans la base de donnée, puis il sera possible de les crééer ou modifier depuis le site.

## Recherche avancée
Le but de Gathering the Magic est de pouvoir visualiser les cartes possibles afin de pouvoir gérer sa collection et en faire des decks. La recherche avancée travaille avec les cartes créée par les utilisateurs. Ceci permet à l'utilisateur de chercher une carte en fonction des critères suivants: Nom, Type, Extension, Couleur, Description. Possibilité d'ajouter de nouveaux paramètres de recherche dans le futur. Si une carte est trouvée durant la recherche, l'utilisateur peut l'ajouter à sa collection.

## Collection
Affiche toutes les cartes de l'utilisateur, avec le nom, l'extension et la quantité. 
L'utilisateur pourra ensuite séléctionner des cartes afin d'en modifier la quantité.
Pas implémenter : L'utilisateur pour utiliser des filtres ou trier la collection en fonction de critères différents.

## Extensions
Pas implémenter : Répertoire des différentes extensions de Magic. Cliquer sur une extension affiche toutes ses cartes et indique à l'utilisateur s'il les possède. 

## Decks
Pas implémenter : L'utilisateur peut compiler ses cartes dans des decks, ce qui lui permet de savoir où ses cartes se trouvent et si elles sont utilisées. Il sera possible d'ajouter dans un deck des cartes non possédées, qui viennent de la wishlist




