<?php
// model.php
// Doc : http://www.finalclap.com/faq/170-php-sqlite-pdo
// Remplissage de données
// $stmt = $pdo->prepare("INSERT INTO notes (title, content, created) VALUES (:title, :content, :created)");
// $result = $stmt->execute(array(
//     'title'         => "Liste de course",
//     'content'         => "Café soluble (Nescafé ?)",
//     'created'       => date("Y-m-d H:i:s")
// ));
function open_database_connection()
{
    try {
        $connection = new PDO('sqlite:'.dirname(__FILE__).'/db.sqlite');
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
        // $connection->query("DROP TABLE notes");
        $connection->query("CREATE TABLE IF NOT EXISTS notes
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

function close_database_connection(&$connection)
{
    $connection = null;
}

function get_all_notes()
{
    $connection = open_database_connection();

    $result = $connection->query('SELECT id, title, content FROM notes');

    $notes = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $notes[] = $row;
    }
    close_database_connection($connection);

    return $notes;
}


function get_notes_by_id($id)
{
    $connection = open_database_connection();

    $query = 'SELECT created, title, content FROM notes WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    close_database_connection($connection);

    return $row;
}
