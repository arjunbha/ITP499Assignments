<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/10/14
 * Time: 7:23 PM
 */

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

$session = new Session();
$session->clear();
$response = new RedirectResponse('login.php');
$response->send();
?>