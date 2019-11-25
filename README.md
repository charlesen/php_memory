# Memory en PHP

## Installation

Memory est un projet permettant la mise en place du jeu du même nom, en PHP.

Ce projet utilise la version 4 de Symfony pour la mise en place d'un MVC simple, mais on aurait pu s'en passer.

La première étape consiste donc à installer notre package Symfony (Voir fichier **composer.json**).

```bash
$ composer install
```

## Jeu de mémoire
Le principe du jeu est relativement simple : Cliquer sur une carte et trouver son double.

Si double trouvé, on a une paire valide. Sinon, vous n'avez plus qu'à recommencer.
Si vous réussisez à valider toutes les paires dans le temps imparti, vous avez remporté la partie.
