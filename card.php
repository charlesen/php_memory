<?php
/** card.php
** Classe Card
** Description : Gestion des cartes (mise en place aléatoire, ...)
** Author : Charles EDOU NZE : <charles AT charlesen DOT fr>
**/
class Card
{

    /**
     * Liste de toutes les cartes
     * @var array
     */
    private $cards = array("static/img/card1.jpg", "static/img/card2.jpg",
                           "static/img/card3.jpg", "static/img/card4.jpg",
                           "static/img/card5.jpg", "static/img/card6.jpg",
                           "static/img/card7.jpg", "static/img/card8.jpg",
                           "static/img/card9.jpg", "static/img/card10.jpg",
                           "static/img/card11.jpg", "static/img/card12.jpg",
                           "static/img/card13.jpg", "static/img/card14.jpg",
                           "static/img/card15.jpg", "static/img/card16.jpg",
                           "static/img/card17.jpg", "static/img/card18.jpg"
                         );

    private $cols = 0;
    private $rows = 0;

    public function __construct()
    {
        // Mélange des cartes de manière aléatoire
        shuffle($this->cards);
        // Get the card objects
        // for ($i = 0; $i < 18; ++$i) {
        //     $this->$cards[$i] = new Card($card_img[$i]);
        //     $this->css[] = $cards[$i]->get_css_block();
        // }
        // On créé les pairs de carte
        $this->cards = array_merge($this->cards, $this->cards);

        // Après doublement, on mélange de nouveau des cartes aléatoirement
        shuffle($this->cards);


        // Nombre de lignes / colonnes...Si affichage en mode tableau html
        // Pas nécessaire avec les grids bootstrap
        $num = count($this->cards);
        $this->rows = floor(sqrt($num));
        while ($num % $this->rows) {
            --$this->rows;
        }
        $this->cols = $num / $this->rows;
    }

    /**
    ** Mélange les cartes, les doublonnes, les re-melange, avant de les envoyer
    **/
    public function get_cards()
    {
        return $this->cards;
    }

    /**
    ** Retourne le nombre de lignes du plateau
    **/
    public function get_rows()
    {
        return $this->rows;
    }

    /**
    ** Retourne le nombre de colonnes du plateau
    **/
    public function get_cols()
    {
        return $this->cols;
    }
}
