<?php
/** controllers.php
** Classe Controller
** Author : Charles EDOU NZE : <charles AT charlesen DOT fr>
** Description : Controleur simple pour la gestion des requetes HTTP
**/

use Symfony\Component\HttpFoundation\Response;

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
        $this->$model = new Model;
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
        $scores = $this->$model->get_all_scores();

        $params = ['cards' => $cards, 'scores' => $scores,
                   'rows' => $board_rows, 'cols' => $board_cols];
        $html = $this->render_template('templates/board.php', $params);

        return new Response($html);
    }

    public function show_score($id)
    {
        $score = $this->$model->get_scores_by_id($id);
        $html = $this->render_template('templates/score.php', ['score' => $score]);

        return new Response($html);
    }

    // helper function to render templates
    public function render_template($path, array $args)
    {
        extract($args);
        ob_start();
        require $path;
        $html = ob_get_clean();

        return $html;
    }
}
