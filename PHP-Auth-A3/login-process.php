<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/10/14
 * Time: 7:23 PM
 */

require __DIR__ . "/vendor/autoload.php";
require_once 'db.php';
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Carbon\Carbon;
use ITP\Auth;

$request = Request::createFromGlobals();
$session = new Session();
$session->start();


if($session->has('email')) {
    //This is if they have logged in already and the email is stored in the session
    $session->getFlashBag()->add('login','You are already logged in!');
    $redirect = new RedirectResponse('dashboard.php');
    $redirect->send();
}
else {
    $username = $request->get('username');
    $password = $request->get('password');
    $auth = new Auth($pdo);
    if($auth->attempt($username,$password)) {
        $session->set('username', $username);
        $session->set('timestamp', Carbon::now());
        $session->getFlashBag()->add('login','You have successfully logged in!');
        $redirect = new RedirectResponse('dashboard.php');
        $redirect->send();
    }
    else {
        $session->getFlashBag()->add('message','Incorrect credentials');
        $redirect = new RedirectResponse('login.php');
        $redirect->send();
    }
}