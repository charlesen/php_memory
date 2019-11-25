<?php
/** controllers.php
** Classe Controller
** Author : Charles EDOU NZE : <charles AT charlesen DOT fr>
** Description : Controleur simple pour la gestion des requetes HTTP
**/

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class Controller
{
    /**
     * Instance du modèle
     * @var object
     */
    private $model;

    public function __construct()
    {
        // Inclusion du modèle
        $this->model = new Model;
    }

    /**
    ** Affichage du plateau de départ
    **/
    public function show_board()
    {
        // Plateau de départ : on récupère les cartes mélangées
        $card = new Card;
        $cards = $card->get_cards();
        $board_rows = $card->get_rows();
        $board_cols = $card->get_cols();

        // Récupération de tous les scores
        $scores = $this->model->get_all_scores();

        $params = ['cards' => $cards, 'scores' => $scores];
        $html = $this->render_template('templates/board.php', $params);

        return new Response($html);
    }



    /**
    ** Affichage de la documentation
    **/
    public function show_doc()
    {
        $html = $this->render_template('templates/doc.php', array());
        return new Response($html);
    }

    /**
    ** Sauvegarde du score après chaque partie à partir du modèle
    ** cf. model.php
    **/
    public function save_score($score)
    {
        $result = $this->model->save_score($score);
        return new JsonResponse($score);
    }

    /**
    ** Helper pour le rendu html
    **/
    public function render_template($path, array $args)
    {
        extract($args);
        ob_start();
        require $path;
        $html = ob_get_clean();

        return $html;
    }
}
