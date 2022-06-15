# Spécifications détaillées

### Sécurité
Le visiteur pourra avoir accès à la page d'acceuil, de connexion et à la recherche avancée, il ne pourra néanmoins pas sélectionner de cartes après ça recherche.

## Connexion
Afin de pouvoir accéder aux fonctionnalités de l'application, l'utilisateur doit se connecter. En effet, le site recense des collections et des decks personnels. Le mot-de-passe est stocké hashé dans la base de donnée. Possibilité d'implémenter une visualisation des decks sans connexion, afin de les partager par exemple. Dans un premier temps les utilisateurs sont créés en dur dans la base de donnée.

## Recherche avancée
Le but de Gathering the Magic est de pouvoir visualiser les cartes possibles afin de pouvoir gérer sa collection et en faire des decks. La recherche avancée travaille avec la base de donnée faite par les utilisateurs. Ceci permet à l'utilisateur de chercher une carte en fonction des critères suivants: Nom, Type, Extension, Couleur, description. Possibilité d'ajouter de nouveaux paramètres de recherche dans le futur. Si une carte est trouvée durant la recherche, l'utilisateur peut l'ajouter à sa collection.

## Collection
Affiche toutes les cartes de l'utilisateur, avec le nom, l'extension et la quantité ainsi que si c'est une carte qu'il possède (owned) ou qu'il aimerait posséder (wishlist).
L'utilisateur pourra utiliser des filtres ou trier la collection en fonction de critères différents.

## Extensions
Répertoire des différentes extensions de Magic. Cliquer sur une extension affiche toutes ses cartes et indique à l'utilisateur s'il les possède. 

## Decks
L'utilisateur peut compiler ses cartes dans des decks, ce qui lui permet de savoir où ses cartes se trouvent et si elles sont utilisées. Il sera possible d'ajouter dans un deck des cartes non possédées, qui viennent de la wishlist




