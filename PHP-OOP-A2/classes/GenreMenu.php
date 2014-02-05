<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/3/14
 * Time: 7:14 PM
 */

class GenreMenu {
    protected $title;
    protected $genres;

    public function __construct($title,$genres) {
        $this->title = $title;
        $this->genres = $genres;
    }

    public function __toString() {
        $list = "<select name='genre' id='".$this->title."'>";
        foreach ($this->genres as $genre) {
            $list = $list . "<option value='$genre->id'>$genre->genre</option>";
        }

        $list = $list . "</select>";

        return $list;
    }
}

?>