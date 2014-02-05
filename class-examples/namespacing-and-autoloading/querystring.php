<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/4/14
 * Time: 6:12 PM
 */

require __DIR__ . '/vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;

$request = Request::createFromGlobals();

echo $request->query->get('fullname'); // $_GET['fullname'];

// header('Location: index.php');
//$response = new RedirectResponse('http://google.com');
//return $response->send();

$session = new Session();
$session->start();
//$session->set('fullname', 'Arjun Bhargava');
//$session->set('email', 'arjunb023@gmail.com');
//$session->set('loginTime', time());
//echo $session->get('fullname');
//echo '<br />';
//echo $session->get('loginTime');

//$session->getFlashBag()->set('statusMessage', 'Thanks!');
var_dump($session->getFlashBag()->get('statusMessage'));

// $request->request->get('fullname'); // $_POST['fullname']