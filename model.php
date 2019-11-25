<?php
// Doc : http://www.finalclap.com/faq/170-php-sqlite-pdo
// Remplissage de données
// $stmt = $pdo->prepare("INSERT INTO scores (title, content, created) VALUES (:title, :content, :created)");
// $result = $stmt->execute(array(
//     'title'         => "Liste de course",
//     'content'         => "Café soluble (Nescafé ?)",
//     'created'       => date("Y-m-d H:i:s")
// ));

/** model.php
** Classe Model
** Author : Charles EDOU NZE : <charles AT charlesen DOT fr>
** Description : Modèle simple pour la persistance (sauvegarde) des données en Base de données
**/

class Model
{
    public function open_database_connection()
    {
        try {
            // $connection->query("DROP TABLE scores");
            $connection = new PDO('sqlite:'.dirname(__FILE__).'/db.sqlite');
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
            $connection->query("CREATE TABLE IF NOT EXISTS scores
        (id INTEGER PRIMARY KEY AUTOINCREMENT,
          title VARCHAR(250),
          content TEXT,
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

    public function get_all_scores()
    {
        $connection = $this->open_database_connection();

        $result = $connection->query('SELECT id, title, content FROM scores');

        $scores = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $scores[] = $row;
        }
        $this->close_database_connection($connection);

        return $scores;
    }


    public function get_scores_by_id($id)
    {
        $connection = $this->open_database_connection();

        $query = 'SELECT created, title, content FROM scores WHERE id=:id';
        $statement = $connection->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $this->close_database_connection($connection);

        return $row;
    }
}
