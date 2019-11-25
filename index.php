<?php
// Front controller
// index.php
/**
** Le Pattern (modèle de conception) "Front controller" est utilisé pour fournir un mécanisme centralisé de traitement
** des requetes (demandes) http pour qu'elles soient traitées par un seul gestionnaire.
** Dans ce modèle chaque URL est associée (à priori) à une action écrite dans le controleur (fichier controllers.php)
** Ex : http://memory.charlesen.fr/list_action ==> methode list_action() du controleur (fichier controllers.php)
**/

// On charge le controleur et le modèle de l'application
require_once 'vendor/autoload.php';

// Chargement des gestionnaires de requetes Symfony
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// On instancie notre controleur qui lancer des actions à partir de l'URL
// saisi dans le navigateur
$controller = new Controller;

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
