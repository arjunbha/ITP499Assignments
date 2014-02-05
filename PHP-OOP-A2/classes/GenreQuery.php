<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/3/14
 * Time: 7:14 PM
 */

class GenreQuery {
    protected $pdo;
    protected $sql;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->sql = "SELECT * FROM genres";
    }

    public function getAll() {
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}

?>