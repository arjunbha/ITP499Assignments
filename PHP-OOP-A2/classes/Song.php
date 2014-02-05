<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/3/14
 * Time: 7:14 PM
 */

class Song {

    protected $id;
    protected $price;
    protected $title;
    protected $artistId;
    protected $genreId;
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function save() {
        $sql = "INSERT INTO songs (title, artist_id, genre_id, price, play_count) VALUES ('$this->title', $this->artistId, $this->genreId, $this->price, 0)";
        $statement = $this->pdo->prepare($sql);
        return $statement->execute();
    }

    public function getId() {
        return $this->pdo->lastInsertId();
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setArtistId($artistId) {
        $this->artistId = $artistId;
    }

    public function setGenreId($genreId) {
        $this->genreId = $genreId;
    }
}

?>