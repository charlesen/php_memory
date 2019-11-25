<?php

/** model.php
** Classe Model
** Author : Charles EDOU NZE : <charles AT charlesen DOT fr>
** Description : Modèle simple pour la persistance (sauvegarde) des données en Base de données
**/

class Model
{
    /**
    ** Ouverture de la base de données
    **/
    public function open_database_connection()
    {
        try {
            // $connection->query("DROP TABLE scores");

            // On utilise SQLite comme moyen de sauvegarde des données
            $connection = new PDO('sqlite:'.dirname(__FILE__).'/db.sqlite');

            // Par défaut on souhaite récupérer des données au format associatif (Style orienté objet)
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT

            // Création de note table scores si celle-ci n'existe pas
            // avec 3 colonnes : id (identifiant unique), score (qui stockera le score de chaque joueur)
            // created (date de sauvegarde du score)
            $connection->query("CREATE TABLE IF NOT EXISTS scores
                              (id INTEGER PRIMARY KEY AUTOINCREMENT,
                              score VARCHAR(250),
                              created DATETIME);");
        } catch (Exception $e) {
            echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
            die();
        }

        return $connection;
    }

    public function close_database_connection(&$connection)
    {
        $connection = null;
    }


    /**
    ** Sauvegarde du score en base de données
    **/
    public function save_score($score)
    {
        $connection = $this->open_database_connection();
        $query = "INSERT INTO scores (score, created) VALUES (:score, :created)";
        $data = [
            'score' => $score,
            'created' => date("Y-m-d H:i:s")
        ];
        $statement = $connection->prepare($query);
        $statement->execute($data);
        $this->close_database_connection($connection);
    }

    /**
    ** Récupération de tous les scores en les ordannant par score, du plus grand au plus petit.
    **/
    public function get_all_scores()
    {
        $connection = $this->open_database_connection();
        $result = $connection->query('SELECT score FROM scores order by score DESC LIMIT 5');

        $scores = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $scores[] = $row;
        }
        $this->close_database_connection($connection);

        return $scores;
    }

    /**
    ** Récupération d'un score en fonction de son identifiant unique
    **/
    public function get_scores_by_id($id)
    {
        $connection = $this->open_database_connection();

        $query = 'SELECT score, created FROM scores WHERE id=:id';
        $statement = $connection->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $this->close_database_connection($connection);

        return $row;
    }
}
