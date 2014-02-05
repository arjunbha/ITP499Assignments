<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/3/14
 * Time: 7:13 PM
 */

class ArtistMenu {
    protected $title;
    protected $artists;

    public function __construct($title,$artists) {
        $this->title = $title;
        $this->artists = $artists;
    }

    public function __toString() {
        $list = "<select name='artist' id='".$this->title."'>";
        foreach ($this->artists as $artist) {
            $list .= "<option value='$artist->id'>$artist->artist_name</option>";
        }
        $list .= "</select>";

        return $list;
    }
}

?>