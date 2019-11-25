# Memory en PHP

## Jeu de mémoire
Le principe du jeu est relativement simple : Cliquer sur une carte et trouver son double.

Si une paire est trouvée, c'est validé. Sinon, vous n'avez plus qu'à recommencer.
Si vous réussissez à valider toutes les paires dans le temps imparti, vous avez remporté la partie.

Chaque partie dure 5 min (300 secondes).

Go !


## Installation

Memory est un projet permettant la mise en place du jeu du même nom, en PHP.

Ce projet utilise la version 4 de Symfony pour la mise en place d'un MVC simple, mais on aurait pu s'en passer.

Pour tester ce projet, vous pouvez le cloner en faisant :

```bash
$ git clone https://github.com/charlesen/php_memory.git
```

La seconde étape consiste simplement à installer notre package Symfony (Voir fichier **composer.json**).

```bash
$ composer install
```


## Architecture du projet
### MVC + Front-Controller
Ce projet utilise Les Patterns (modèle de conception) "Front controller" qui, est utilisé pour fournir un mécanisme centralisé de traitement
des requêtes (demandes) http pour qu'elles soient traitées par un seul gestionnaire, et MVC (Modèle - Vue - Controlleur) qui permet d'organiser son code
en séparant ce que l'on affiche, de ce que l'on souhaite afficher.

Dans ce modèle chaque URL est associée (à priori) à une action écrite dans le contrôleur (fichier controllers.php. Pensez au contrôleur SNCF, qui vérifie que vous avez le bon ticket de voyahe)
Ex : http://memory.charlesen.fr/doc ==> méthode show_doc() du contrôleur (fichier controllers.php)

Pour les besoins de notre projet, nous avons besoin uniquement d'effectuer 2 requête : l'affichage du plateau + la documentation.

### SQLite
Pour les besoins du projet, nous utilisons SQLite (db.sqlite), qui permet la sauvegarde de données sur un fichier local.


### Code source
HTTP (Hypertext Transfer Protocol) est un langage texte qui permet à deux machines (comme un ordinateur) de communiquer entre elles.
Chaque fois que vous ouvrez votre navigateur préféré (Chrome je suppose ?) et saisissez une url comme google.fr, vous effectuez une requete HTTP.

Dans ce projet, toutes les requêtes HTTP sont traitées par notre fichier index.php (front controller) grâce la classe Request de symfony.
```php
$request = Request::createFromGlobals();
```

On créé ensuite une instance de notre contrôleur, qui se chargera d'associer notre url à une action particulière. Sinon renvoie une erreur 404 si aucune action existante
```php

// On instancie notre contrôleur qui lancer des actions à partir de l'URL
// saisi dans le navigateur
$controller = new Controller;

// Recupère l'URL du navigateur
$uri = $request->getPathInfo();
if ('/' === $uri) {
    $response = $controller->show_board();
} elseif ('/save_score' === $uri && $request->request->get('score')) {
    $response = $controller->save_score($request->request->get('score'));
} elseif ('/doc' === $uri) {
    $response = $controller->show_doc();
} else {
    $html = '<html><body><h1>Page introuvable</h1></body></html>';
    $response = new Response($html, Response::HTTP_NOT_FOUND);
}

// Renvoie la réponse au navigateur
$response->send();

```

Son rôle est de décortiquer l'url saisie dans la barre d'adresse de votre navigateur et en fonction de sa valeur vous retourne la page ou le contenu demandé (VUE).
