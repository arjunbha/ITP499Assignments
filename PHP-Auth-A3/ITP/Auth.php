<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/18/14
 * Time: 2:07 PM
 */
namespace ITP;
use Symfony\Component\HttpFoundation\Session\Session;

Class Auth {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function attempt($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $statement = $this->pdo->prepare($sql);
        $encrypted = SHA1($password);
        $statement->bindParam(1, $username);
        $statement->bindParam(2, $encrypted);
        $statement->execute();
        $authResponse = $statement->fetchAll();

        if(sizeof($authResponse) == 1) {
            $session = new Session();
            $session->set('email',$authResponse[0]["email"]);
            return true;
        }
        else {
            return false;
        }


    }

}