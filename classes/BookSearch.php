<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 3/25/14
 * Time: 6:10 PM
 */

class BookSearch {
    private $bookList;

    public function __construct($books) {
        $this->bookList = $books;
    }

    public function find($query, $exact) {
        $return = array();

        if($exact == FALSE) {
            foreach($this->bookList as $title => $actualTitle){
                if(strpos(strtolower($title), strtolower($query)) !== FALSE){
                    $return[$title] = $actualTitle;
                }
            }
        }

        if($exact == TRUE) {
            foreach($this->bookList as $title => $actualTitle){
                if(strtolower($title) == strtolower($query)){
                    $return[$title] = $actualTitle;
                }
            }
        }

        if(count($return) > 0) {
            return $return;
        }
        else return FALSE;
    }
}